<?php
namespace App\Http\Controllers\Api\Auth;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Services\Admin\Category\categoryService;

class CategoryController{

    public function index(){
        $categories=Category::paginate(10);
        if(!$categories){
            return response()->json([
                'Error' => 'Error',
            ], 200);
        }
        return response()->json([
            'data' => CategoryResource::collection($categories),
            'message' => 'Categories retrieved successfully',
        ], 200);
    }
}