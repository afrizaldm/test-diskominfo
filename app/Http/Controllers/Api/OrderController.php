<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Order::all();

        return response()->json(['message' => 'Order List', 'data' => $data],  200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Order::Create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($order)
    {
        $order = Order::find($order);

        if($order) {
            return response()->json(['message' => 'Order Detail', 'data' => $order], 200);
        }

        return response()->json(['message' => 'Order not found'], 404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($order)
    {
        $order = Order::find($order);

        if ($order) {
            
            $order->delete();
            Order::where('order_id', $order->id)->delete();

            return response()->json(['message' => 'Order  deleted successfully', 'data' => $order], 200);
        }

        return response()->json(['message' => 'Order  not found'], 404);
    }
}
