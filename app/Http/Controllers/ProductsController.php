<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::orderBy('name', 'asc')->get();
        foreach($products as $index => $products){
            $count[$index] = Post::where('products', $products->id)->count();;
        }
        return view('productss.index', compact("products", "count"));
    }
    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "name"=>'required'
        ]);
        Category::create([
            "name"=>$validated['name'],
            "description"=> $request->description,
        ]);
        return redirect(route('products.index'))->with('message', 'Categoria creata con successo');
    }

    public function show(Products $products)
    {
        return view('products.show', ["product"=>$product]);
    }
    public function edit(Products $products)
    {
        return view('products.edit',["product"=>$product]);
    }

    public function update(Request $request, Products $products)
    {
        //
    }

    public function destroy(Products $products)
    {
        //
    }
}
