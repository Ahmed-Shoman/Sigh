<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::first();

        if (!$settings) {
            return response()->json([
                'status' => 'success',
                'message' => 'Settings are empty',
                'data' => [],
            ], Response::HTTP_OK);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Settings retrieved successfully',
            'data' => [
                 'metaTitle' => $settings->meta_title,
                'metaDescription' => $settings->meta_description,
                'nameBrand' => $settings->name_brand,
                'mobile' => $settings->mobile,
                'whatsapp' => $settings->whatsapp,
                'location' => $settings->location,
                'email' => $settings->email,
                'timeWork' => $settings->time_work,
                'privacy' => $settings->privacy,
                'termsAndCondition' => $settings->terms_and_condition,
                'priceDelivery' => $settings->price_delivery,
                'priceFastDelivery' => $settings->price_fast_delivery,
            ],
        ], Response::HTTP_OK);
    }
}
