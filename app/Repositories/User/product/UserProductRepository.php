<?php

namespace App\Repositories\User\Product;

use App\Models\Category;
use App\Models\Product;
use App\Repositories\User\product\UserProductRepositoryInterface;

class UserProductRepository implements UserProductRepositoryInterface
{
    public function all()
    {
        return Product::all();
    }
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $categories = $product->category_id;
        $category = Category::findOrFail($categories);
        return [$category, $product];
    }
}  























    // public function filter($categoryId)
    // {
    //     return Product::where("category_id", $categoryId)->get();
    // }
    // public function category()
    // {
    //     return Category::all();
    // }
