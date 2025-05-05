<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FeatureSection;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class FeatureSectionController extends Controller
{
    public function index(): JsonResponse
    {
        $sections = FeatureSection::all();
        return response()->json($sections);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'main_title' => 'required|string|max:255',
            'description' => 'required|string',
            'items' => 'nullable|array',
            'items.*.icon' => 'required_if:items,!=,null|string|max:255',
            'items.*.title' => 'required_if:items,!=,null|string|max:255',
            'items.*.subtitle' => 'nullable|string|max:255',
        ]);

        $section = FeatureSection::create($validated);
        return response()->json($section, 201);
    }

    public function show(FeatureSection $featureSection): JsonResponse
    {
        return response()->json($featureSection);
    }

    public function update(Request $request, FeatureSection $featureSection): JsonResponse
    {
        $validated = $request->validate([
            'main_title' => 'required|string|max:255',
            'description' => 'required|string',
            'items' => 'nullable|array',
            'items.*.icon' => 'required_if:items,!=,null|string|max:255',
            'items.*.title' => 'required_if:items,!=,null|string|max:255',
            'items.*.subtitle' => 'nullable|string|max:255',
        ]);

        $featureSection->update($validated);
        return response()->json($featureSection);
    }

    public function destroy(FeatureSection $featureSection): JsonResponse
    {
        $featureSection->delete();
        return response()->json(null, 204);
    }
}
