@extends('layouts.adminheader')

@section('content')

<div class="container px-4 py-8 mx-auto">
    <div class="admin-main">
        <h2 class="mb-8 text-3xl font-bold text-left text-gray-900">Edit Product</h2>
        <form action="{{ url('product/update/' . $product->id) }}" enctype="multipart/form-data" method="post" class="space-y-6">
            @csrf

            <div class="space-y-4">
                <label for="product_name" class="block font-semibold text-gray-700">Product Name:</label>
                <input type="text" name="product_name" id="product_name" class="w-full p-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-blue-500" value="{{ $product->pro_name }}" placeholder="Enter product name">
            </div>

            <div class="space-y-4">
                <label for="product_price" class="block font-semibold text-gray-700">Product Price:</label>
                <input type="number" name="product_price" id="product_price" step="0.01" class="w-full p-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-blue-500" value="{{ $product->pro_price }}" placeholder="Enter product price">
            </div>

            <div class="space-y-4">
                <label for="category" class="block font-semibold text-gray-700">Category:</label>
                <input type="text" name="category" id="category" class="w-full p-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-blue-500" value="{{ $product->category }}" placeholder="Enter product keyword">
            </div>

            <div class="space-y-4">
                <label for="shelf_life" class="block font-semibold text-gray-700">Shelf Life:</label>
                <input type="text" name="shelf_life" id="shelf_life" class="w-full p-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-blue-500" value="{{ $product->shelf_life }}" placeholder="Enter shelf life">
            </div>

            <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                <div class="space-y-4">
                    <label for="product_width" class="block font-semibold text-gray-700">Width (cm):</label>
                    <input type="text" name="product_width" id="product_width" class="w-full p-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-blue-500" value="{{ $product->pro_width }}" placeholder="Enter width">
                </div>

                <div class="space-y-4">
                    <label for="product_height" class="block font-semibold text-gray-700">Height (cm):</label>
                    <input type="text" name="product_height" id="product_height" class="w-full p-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-blue-500" value="{{ $product->pro_height }}" placeholder="Enter height">
                </div>

                <div class="space-y-4">
                    <label for="product_length" class="block font-semibold text-gray-700">Length (cm):</label>
                    <input type="text" name="product_length" id="product_length" class="w-full p-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-blue-500" value="{{ $product->pro_length }}" placeholder="Enter length">
                </div>
            </div>

            <div class="space-y-4">
                <label for="product_description" class="block font-semibold text-gray-700">Description:</label>
                <textarea name="product_description" id="product_description" rows="4" class="w-full p-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-blue-500" placeholder="Enter product description">{{ $product->pro_description }}</textarea>
            </div>
            <div class="space-y-4">
                <label for="quantity" class="block font-semibold text-gray-700">Quantity:</label>
                <textarea name="quantity" id="quantity" rows="4" class="w-full p-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-blue-500" placeholder="Enter product description">{{ $product->pro_description }}</textarea>
            </div>

            <div class="space-y-4">
                <label for="product_image" class="block font-semibold text-gray-700">Product Image:</label>
                <input type="file" name="product_image" id="product_image" class="w-full p-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-blue-500">
                <p class="mt-2 text-gray-600">Current image:</p>
                <img src="{{ asset($product->pro_image_url) }}" alt="Current Image" class="object-cover w-40 h-auto mt-2 rounded-md">
            </div>

            <div class="flex justify-center">
                <button type="submit" class="neutral-button">Update Product</button>
            </div>
        </form>
    </div>
</div>

@endsection