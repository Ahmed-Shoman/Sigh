<?PHP
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CoffeeCulture;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CoffeeCultureController extends Controller
{
    public function index(): JsonResponse
    {
        $cultures = CoffeeCulture::all();
        return response()->json($cultures);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'main_title' => 'required|string|max:255',
            'description' => 'required|string',
            'title' => 'required|string|max:255',
            'images' => 'nullable|array',
            'images.*.image' => 'required_if:images,!=,null|url|max:255',
            'images.*.alt' => 'nullable|string|max:255',
            'items' => 'nullable|array',
            'items.*.icon' => 'required_if:items,!=,null|string|max:255',
            'items.*.link' => 'required_if:items,!=,null|url|max:255',
            'cta_button_link' => 'nullable|url|max:255',
        ]);

        $culture = CoffeeCulture::create($validated);
        return response()->json($culture, 201);
    }

    public function show(CoffeeCulture $coffeeCulture): JsonResponse
    {
        return response()->json($coffeeCulture);
    }

    public function update(Request $request, CoffeeCulture $coffeeCulture): JsonResponse
    {
        $validated = $request->validate([
            'main_title' => 'required|string|max:255',
            'description' => 'required|string',
            'title' => 'required|string|max:255',
            'images' => 'nullable|array',
            'images.*.image' => 'required_if:images,!=,null|url|max:255',
            'images.*.alt' => 'nullable|string|max:255',
            'items' => 'nullable|array',
            'items.*.icon' => 'required_if:items,!=,null|string|max:255',
            'items.*.link' => 'required_if:items,!=,null|url|max:255',
            'cta_button_link' => 'nullable|url|max:255',
        ]);

        $coffeeCulture->update($validated);
        return response()->json($coffeeCulture);
    }

    public function destroy(CoffeeCulture $coffeeCulture): JsonResponse
    {
        $coffeeCulture->delete();
        return response()->json(null, 204);
    }
}
