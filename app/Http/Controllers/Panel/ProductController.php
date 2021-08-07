<?php

namespace App\Http\Controllers\Panel;

use App\Models\PanelProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    // public function __construct()
    // {
    //     // ->only('create') solo proteje esta ruta
    //     // except(['index', 'create']) proteje todas las rutas exepto estas
    //     $this->middleware('auth');
    // }
    //
    public function index(){
        $products = PanelProduct::without('images')->get();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(ProductRequest $request)
    {
        $product = PanelProduct::create($request->validated());

        return redirect()
        ->route('product.index')
        ->withSuccess("The new product with id is {$product->id} was created");
    }

    public function show(PanelProduct $product)
    {
        return view('product.show', compact('product'));
    }

    public function edit(PanelProduct $product)
    {
        return view('product.edit', compact('product'));
    }

    public function update(ProductRequest $request, PanelProduct $product)
    {
        $product->update( $request->validated() );

        return redirect()
        ->route('product.index')
        ->with('success',"The new product with id is {$product->id} was updated");
    }

    public function destroy(PanelProduct $product)
    {
        $product->delete();
        return redirect()
        ->route('product.index')
        ->withSuccess("The new product with id is {$product->id} was deleted");
    }
}
