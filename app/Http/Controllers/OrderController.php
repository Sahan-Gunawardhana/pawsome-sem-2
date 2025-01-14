<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with(['orderItems.product', 'customer'])->paginate(10);
        return OrderResource::collection($orders);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:users,id',
            'order_date' => 'nullable|date',
            'zip_code' => 'required|string|max:10',
            'province' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'total' => 'required|numeric|min:0',
            'status' => 'required|string|in:pending,processing,completed,cancelled'
        ]);

        $order = Order::create($validated);
        return new OrderResource($order);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::with(['orderItems', 'customer'])->findOrFail($id);
        return new OrderResource($order);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:users,id',
            'order_date' => 'nullable|date',
            'zip_code' => 'required|string|max:10',
            'province' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'total' => 'required|numeric|min:0',
            'status' => 'required|string|in:pending,confirmed,shipped,cancelled'
        ]);

        $order = Order::findOrFail($id);
        $order->update($validated);
        return new OrderResource($order);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return response()->json(['message' => 'Order deleted successfully'], 200);
    }
}
