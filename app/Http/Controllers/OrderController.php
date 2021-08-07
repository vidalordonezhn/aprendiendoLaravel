<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\CartService;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class OrderController extends Controller
{

    public $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
        $this->middleware('auth');
    }


    public function create()
    {
        //
        $cart = $this->cartService->getFromCookie();

        if (!isset($cart) || $cart->products->isEmpty()) {
            return redirect()->back()->withErrors("Your cart is empty!");
        }

        return view('orders.create', ['cart' => $cart]);
    }

    public function store(Request $request)
    {
        return DB::transaction(function () use ($request) {
            $user = $request->user();

            $order = $user->orders()->create([
                'status' => 'pending'
            ]);

            $cart = $this->cartService->getFromCookie();

            $cartProductWithQuantity = $cart->products
                ->mapWithKeys(function ($product) {
                    $quantity = $product->pivot->quantity;
                    
                    if ($product->stock < $quantity) {
                        throw ValidationException::withMessages([
                            'product' => "There is not enough stock for the quantity you required of {$product->tile}",
                        ]);
                    }
                    
                    $product->decrement('stock', $quantity);
                    $element[$product->id] = ['quantity' => $product->pivot->quantity];
                    return $element;
                });

            $order->products()->attach($cartProductWithQuantity->toArray());

            return redirect()->route('orders.payment.create', compact('order'));
        });
    }
}
