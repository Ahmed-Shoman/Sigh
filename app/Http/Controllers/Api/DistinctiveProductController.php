<?php
// app/Http/Controllers/Api/DistinctiveProductController.php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DistinctiveProduct;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class DistinctiveProductController extends Controller
{
    public function index(): JsonResponse
    {
        $products = DistinctiveProduct::all();
        return response()->json($products);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'main_title' => 'required|string|max:255',
            'description' => 'required|string',
            'products' => 'nullable|array',
            'products.*.image' => 'required_if:products,!=,null|string',
            'products.*.product_title' => 'required_if:products,!=,null|string|max:255',
            'products.*.product_description' => 'required_if:products,!=,null|string|max:1000',
            'products.*.price' => 'required_if:products,!=,null|numeric|min:0|max:999999.99',
        ]);

        $product = DistinctiveProduct::create($validated);
        return response()->json($product, 201);
    }

    public function show(DistinctiveProduct $distinctiveProduct): JsonResponse
    {
        return response()->json($distinctiveProduct);
    }

    public function update(Request $request, DistinctiveProduct $distinctiveProduct): JsonResponse
    {
        $validated = $request->validate([
            'main_title' => 'required|string|max:255',
            'description' => 'required|string',
            'products' => 'nullable|array',
            'products.*.image' => 'required_if:products,!=,null|string|max:255',
            'products.*.product_title' => 'required_if:products,!=,null|string|max:255',
            'products.*.product_description' => 'required_if:products,!=,null|string|max:1000',
            'products.*.price' => 'required_if:products,!=,null|numeric|min:0|max:999999.99',
        ]);

        $distinctiveProduct->update($validated);
        return response()->json($distinctiveProduct);
    }

    public function destroy(DistinctiveProduct $distinctiveProduct): JsonResponse
    {
        $distinctiveProduct->delete();
        return response()->json(null, 204);
    }
}
