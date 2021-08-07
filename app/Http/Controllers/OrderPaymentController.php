<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Services\CartService;
use Illuminate\Support\Facades\DB;

class OrderPaymentController extends Controller
{
    public $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
        $this->middleware('auth');
    }

    public function create(Order $order)
    {
        //
        return view('payments.create', compact('order'));
    }


    public function store(Request $request, Order $order)
    {

        return DB::transaction(function () use ($order) {
            $this->cartService->getFromCookie()->products()->detach();
            //aqui ireia el pago hacia la cuenta

            $order->payment()->create([
                'amount' => $order->total,
                'payed_at' => now()
            ]);

            $order->status = 'payed';
            $order->save();

            return redirect()->route('main')->withSuccess('Gracias por su compra');
        }, 5);
    }
}
