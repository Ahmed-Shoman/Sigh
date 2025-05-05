<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        if ($products->isEmpty()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Products are empty',
                'data' => [],
            ], Response::HTTP_OK);
        }

 
        $productData = $products->map(function ($product) {
            return [
                'image' => $product->image ? asset("storage/{$product->image}") : null,
                'name' => $product->name,
                'rate' => $product->rate,
                'description' => $product->description,
                'price' => $product->price,
                'tags' => $product->tages,
            ];
        });

        return response()->json([
            'status' => 'success',
            'message' => 'Products retrieved successfully',
            'data' => $productData,
        ], Response::HTTP_OK);
    }
}
