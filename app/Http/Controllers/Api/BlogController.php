<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends Controller
{
    public function index()
    {
        $blogs=Blog::all();
        if ($blogs->isEmpty()) {
            return response()->json([
                'status' => 'success',
                'message' => 'blogs are empty',
                'data' => [],
            ], Response::HTTP_OK);
        }

        $blogsData = $blogs->map(function ($blogs) {
            return [
                'image' => $blogs->image ? asset("storage/{$blogs->image}") : null,
                'title' => $blogs->title,
                'slug' => $blogs->slug,
                'description' => $blogs->description,
                'tags' => $blogs->tags,
                'status' => $blogs->status,
                'publish_time' => $blogs->publish_time,
            ];
        });

        return response()->json([
            'status' => 'success',
            'message' => 'blogs retrieved successfully',
            'data' => $blogsData,
        ], Response::HTTP_OK);
    }
}
