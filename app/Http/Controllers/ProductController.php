<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return Inertia::render('products/index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        return Inertia::render('products/create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {

        $data = $request->validated();
        $product = new Product();
        $product->fill($data);
        $product->slug = Str::slug($product->title);
        $product->save();
        /* REINDIRIZZO ALLA ROTTA INDEX, CON UN MESSAGGIO */
        return Redirect::route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {

        return Inertia::render('products/edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
