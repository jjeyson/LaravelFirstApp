<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cookie;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductCartController extends Controller
{
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        $cart = $this->getFromCookieOrCreate();

        $quantity = $cart->products()
            ->find($product->id)
            ->pivot
            ->quantity ?? 0;
        // Añade los productos aumentando el quantity y anexando nuevos productos sin borrar lo anterior
        $cart->products()->syncWithoutDetaching([
            $product->id => ['quantity' => $quantity + 1],
        ]);

        // $cookie = cookie()->make('cart',$cart->id, 7*24*60);
        $cookie = Cookie::make('cart',$cart->id, 7*24*60);

        return redirect()->back()->cookie($cookie);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, Cart $cart)
    {
        //
    }

    public function getFromCookieOrCreate()
    {
        // $cartId = cookie()->get('cart');
        $cartId = Cookie::get('cart');

        $cart = Cart::find($cartId);

        return $cart ?? Cart::create();
    }
}
