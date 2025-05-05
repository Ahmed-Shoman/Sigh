<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SliderController extends Controller
{
    private function processImages($images): array
    {
        if (empty($images)) {
            return [];
        }

        // Convert JSON or CSV to array
        if (is_string($images)) {
            $images = json_decode($images, true) ?? explode(',', $images);
        }

        return array_map(fn($image) => asset("storage/{$image}"), (array) $images);
    }

    public function index()
    {
        $slider = Slider::first();

        if (!$slider) {
            return response()->json([
                'status' => 'success',
                'message' => 'No slider found',
                'data' => [],
            ], Response::HTTP_OK);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Slider retrieved successfully',
            'data' => [
                'imageSlider' => $slider->image_slider ? asset("storage/{$slider->image_slider}") : null,
                'urlVido' => $slider->url_vido,
                'sliderTitle' => $slider->slider_title,  
                'subTitle' => $slider->sub_title,
                'titleImage' => $slider->title_image,
                'subTitleImage' => $slider->sub_title_image,
                'images' => self::processImages($slider->images), 
            ],
        ], Response::HTTP_OK);
    }
}
