<?php
// app/Http/Controllers/Api/SighContentController.php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SighContent;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class SighContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $contents = SighContent::all();
        return response()->json($contents);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'main_title' => 'required|string|max:255',
            'description' => 'required|string',
            'images' => 'nullable|array',
            'images.*.url' => 'required_if:images,!=,null|url',
            'images.*.alt' => 'nullable|string|max:255',
            'sub_title' => 'nullable|string|max:255',
        ]);

        $content = SighContent::create($validated);
        return response()->json($content, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(SighContent $sighContent): JsonResponse
    {
        return response()->json($sighContent);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SighContent $sighContent): JsonResponse
    {
        $validated = $request->validate([
            'main_title' => 'required|string|max:255',
            'description' => 'required|string',
            'images' => 'nullable|array',
            'images.*.url' => 'required_if:images,!=,null|url',
            'images.*.alt' => 'nullable|string|max:255',
            'sub_title' => 'nullable|string|max:255',
        ]);

        $sighContent->update($validated);
        return response()->json($sighContent);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SighContent $sighContent): JsonResponse
    {
        $sighContent->delete();
        return response()->json(null, 204);
    }
}

// app/Http/Resources/SighContentResource.php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SighContentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'main_title' => $this->main_title,
            'description' => $this->description,
            'images' => $this->images,
            'sub_title' => $this->sub_title,
            'created_at' => $this->created_at->toIso8601String(),
            'updated_at' => $this->updated_at->toIso8601String(),
        ];
    }
}

// routes/api.php
use App\Http\Controllers\Api\SighContentController;

