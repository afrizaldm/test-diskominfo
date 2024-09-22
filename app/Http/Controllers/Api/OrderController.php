<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use App\Models\DetailOrder;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Validation\ValidationException;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Order::with(['detail_orders' => function ($query) {
            $query->with(['product']);
        }])->get()
            ->map(function ($value) {
                return [
                    'id' => $value->id,
                    'products' => $value->detail_orders->map(function ($detail) {
                        return [
                            'id' => $detail->id,
                            'name' => $detail->name,
                            'price' => $detail->price,
                            'quantity' => $detail->id,
                            'stock' => $detail->product->stock,
                            'sold' => $detail->product->sold,
                            'created_at' => $detail->created_at,
                            'updated_at' => $detail->updated_at,
                        ];
                    }),
                    'created_at' => $value->created_at,
                    'updated_at' => $value->updated_at,
                ];
            });

        return response()->json(['message' => 'Order List', 'data' => $data],  200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        try {

            $validated = $request->validate([
                'products' => 'required|array',
            ], [
                'products.required' => 'The name field is required.',
            ]);

            $status = Order::create($request->all());

            $product = Order::find($status->id);

            if ($product) {
                return response()->json(['message' => 'Product created successfully', 'data' => $product],  201);
            }

            return response()->json(['message' => 'Product created failed'],  201);
        } catch (ValidationException $e) {

            return response()->json([
                'message' => 'Product not found',
            ], 404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($order)
    {
        $data = Order::with(['detail_orders' => function ($query) {
            $query->with(['product']);
        }])->where('id', $order)->get()
            ->map(function ($value) {
                return [
                    'id' => $value->id,
                    'products' => $value->detail_orders->map(function ($detail) {
                        return [
                            'id' => $detail->id,
                            'name' => $detail->name,
                            'price' => $detail->price,
                            'quantity' => $detail->id,
                            'stock' => $detail->product->stock,
                            'sold' => $detail->product->sold,
                            'created_at' => $detail->created_at,
                            'updated_at' => $detail->updated_at,
                        ];
                    }),
                    'created_at' => $value->created_at,
                    'updated_at' => $value->updated_at,
                ];
            })->first();

        if ($data) {
            return response()->json(['message' => 'Order Detail', 'data' => $data], 200);
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
    public function update(UpdateOrderRequest $request, $order)
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
