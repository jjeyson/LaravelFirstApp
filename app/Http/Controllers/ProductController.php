<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index')->with([
            'products' => Product::all()
        ]);
    }
    public function create(){
        return view('products.create');
    }
    public function store(){

        $rules = [
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'price' => ['required', 'min:1'],
            'stock' => ['required', 'min:0'],
            'status' => ['required', 'in:Available,Unavailable'],
        ];
        request()->validate($rules);

        if (request()->status == 'Unavailable' && request()->stock == 0) {
            // session()->put('error','If available must have stock');
            session()->flash('error','If available must have stock');
            return redirect()->back();
        }
        session()->forget('error');
        $product = Product::create(request()->all());

        // return redirect()->back();
        // return redirect()->action('MainController@index');
        return redirect()->route('products.index');
    }
    public function show($product){
        // $product = DB::table('products')->where('id',$product)->first();
        $product = Product::findOrFail($product);
        return view('products.show')->with([
            'product' => $product,
            'html' => '<a href="#">Hola Baby</a>',
        ]);
    }
    public function edit($product){
        return view('products.edit')->with([
            'product' => Product::findOrFail($product),
        ]);
    }
    public function update($product){
        $rules = [
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'price' => ['required', 'min:1'],
            'stock' => ['required', 'min:0'],
            'status' => ['required', 'in:Available,Unavailable'],
        ];
        request()->validate($rules);
        $product = Product::findOrFail($product);
        $product->update(request()->all());
        return redirect()->route('products.index');
    }
    public function destroy($product){
        $product = Product::findOrFail($product);
        $product->delete();
        return redirect()->route('products.index');
    }
}
