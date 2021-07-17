<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cookie;
use App\Models\Cart;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProductCartController extends Controller
{
    public $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        
        $cart = $this->cartService->getFromCookieOrCreate();
        $quantity = $cart->products()
        ->find($product->id)
        ->pivot
        ->quantity ?? 0;
        
        if ($product->stock < $quantity +1) {
            throw ValidationException::withMessages([
                'product' => "There is not enought stock for the quantity you required of {
                $product->title
            }",]);
        }

        // Añade los productos aumentando el quantity y anexando nuevos productos sin borrar lo anterior
        $cart->products()->syncWithoutDetaching([
            $product->id => ['quantity' => $quantity + 1],
        ]);
        $cart->touch();
        // $cookie = cookie()->make('cart',$cart->id, 7*24*60);
        $cookie = $this->cartService->makeCookie($cart);
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
        $cart->products()->detach($product->id);
        $cart->touch();
        $this->cartService->makeCookie($cart);

        return redirect()->back();
    }
}
