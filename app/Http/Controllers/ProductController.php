<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(10);
        return ProductResource::collection($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pro_name' => 'required|string|max:255',
            'pro_price' => 'required|numeric|min:0',
            'category' => 'required|string|max:255',
            'shelf_life' => 'required|integer|min:0',
            'pro_description' => 'required|string',
            'pro_width' => 'required|numeric|min:0',
            'pro_height' => 'required|numeric|min:0',
            'pro_length' => 'required|numeric|min:0',
            'pro_image_url' => 'required|url'
        ]);

        $product = Product::create($validated);
        return new ProductResource($product);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'pro_name' => 'required|string|max:255',
            'pro_price' => 'required|numeric|min:0',
            'category' => 'required|string|max:255',
            'shelf_life' => 'required|integer|min:0',
            'pro_description' => 'required|string',
            'pro_width' => 'required|numeric|min:0',
            'pro_height' => 'required|numeric|min:0',
            'pro_length' => 'required|numeric|min:0',
            'pro_image_url' => 'required|url'
        ]);

        $product = Product::findOrFail($id);
        $product->update($validated);
        return new ProductResource($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(['message' => 'Product deleted successfully'], 200);
    }
}
