<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;

use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{   
    //load items to the orders
    public function index(){
        $orders = Order::with('orderItems')->get();
        return view ('admin.manageO', ['orders' => $orders]);
    }

    //updates the order
    public function update(Request $request){
        $order = Order::find($request->input('order_id'));
        $order->status = $request->input('status');
        $order->save();

        return redirect('admin/manageO');
    }
    //finds the order items realted to that 
    public function show($orderId)
    {
        $order = Order::with('orderItems.product')->findOrFail($orderId);   
        return view('order.view', compact('order'));
    }

    //deltes an order
    public function delete(Request $request)
    {
        $orderId = $request->input('order_id'); 
        Order::find($orderId)->delete();
        return redirect()->route('admin.manageO'); 
    }
}
