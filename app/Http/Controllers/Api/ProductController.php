<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::all();

        return response()->json(['message' => 'Product List', 'data' => $data],  200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        try {

            $validated = $request->validate([
                'name' => 'required|string',
                'price' => 'required|numeric',
                'stock' => 'required|integer',
            ], [
                'name.required' => 'The name field is required.',
                'price.required' => 'The price field is required.',
                'stock.required' => 'The stock field is required.',
            ]);

            $status = Product::create($request->all());

            $product = Product::find($status->id);

            if ($product) {
                return response()->json(['message' => 'Product created successfully', 'data' => $product],  201);
            }

            return response()->json(['message' => 'Product created failed'],  201);
        } catch (ValidationException $e) {

            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors(),
            ], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $data = Product::find($product);

        if ($data) {
            return response()->json(['message' => 'Product Detail', 'data' => $data], 200);
        }

        return response()->json(['message' => 'Product not found'], 404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, $product)
    {
        $product = Product::find($product);

        if ($product) {
            $product->fill(
                $request->all()
            );
            $product->save();

            return response()->json(['message' => 'Product deleted successfully', 'data' => $product], 200);
        }

        return response()->json(['message' => 'Product not found'], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($product)
    {
        $product = Product::find($product);

        if ($product) {
            $product->delete();
            return response()->json(['message' => 'Product deleted successfully', 'data' => $product], 200);
        }

        return response()->json(['message' => 'Product not found'], 404);
    }
}
