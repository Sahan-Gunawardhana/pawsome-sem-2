<?php

namespace App\Http\Controllers\WebControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Box;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use ArielMejiaDev\LarapexCharts\DonutChart;
use ArielMejiaDev\LarapexCharts\HeatMapChart;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function loadHome()
    {
        
    }
    //lets the admin create a new product
    public function save(Request $req)
    {

        if ($req->hasfile('product_image')) {
            $path = $req->file('product_image')->store('product_images', 'public');
            $fileUrl = Storage::url($path);
        } else {
            $fileUrl = null;
        }


        Product::create([
            'pro_name' => $req->input('product_name'),
            'pro_price' => $req->input('product_price'),
            'category' => $req->input('category'),
            'shelf_life' => $req->input('shelf_life'),
            'pro_description' => $req->input('product_description'),
            'pro_width' => $req->input('product_width'),
            'pro_height' => $req->input('product_height'),
            'pro_length' => $req->input('product_length'),
            'quantity' => $req->input('quantity'),
            'pro_image_url' => $fileUrl
        ]);

        return redirect()->back();
    }
    //deletes a product
    public function delete(Request $request)
    {
        Product::find($request->input('pro_id'))->delete();
        return redirect('admin/manageP');
    }
    //edits a product
    public function edit(Product $item)
    {
        return view('product.edit', ['product' => $item]);
    }

    public function update(Product $item, Request $request)
    {
        if ($request->hasFile('product_image')) {
            $path = $request->file('product_image')->store('product_images', 'public');
            $fileUrl = Storage::url($path);
        } else {
            $fileUrl = $item->pro_image_url;
        }

        $item->update([
            'pro_name' => $request->input('product_name'),
            'pro_price' => $request->input('product_price'),
            'category' => $request->input('category'),
            'shelf_life' => $request->input('shelf_life'),
            'pro_width' => $request->input('product_width'),
            'pro_height' => $request->input('product_height'),
            'pro_length' => $request->input('product_length'),
            'pro_description' => $request->input('product_description'),
            'quantity' => $request->input('quantity'),
            'pro_image_url' => $fileUrl
        ]);

        return redirect('admin/manageP');
    }

    //load products to the table
    public function index()
    {
        $products = Product::all();
        return view('admin.manageP', ['products' => $products],);
    }

    //load products to the store page
    public function store()
    {
        $products = Product::get();
        return view('store', ['products' => $products]);
    }
}
