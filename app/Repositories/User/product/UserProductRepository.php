<?php

namespace App\Repositories\User\Product;

use App\Models\Category;
use App\Models\Product;
use App\Repositories\User\product\UserProductRepositoryInterface;

class UserProductRepository implements UserProductRepositoryInterface
{
    public function all()
    {
        $products = Product::all();
        $categories = Category::all();
        return [$products,$categories];
    }
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $categories = $product->category_id;
        $category = Category::findOrFail($categories);
        return [$category, $product];
    }
     public function filter($categoryId)
    {
        if(Category::where("id",$categoryId)){
            $products = Product::where("category_id", $categoryId)->get();
            $category= Category::where("id",$categoryId)->get();
            return [$products,$category]; 

        }else {
            return back()->with("errors" , "This Category Not Found");
        }

    }
}  























   
    // public function category()
    // {
    //     return Category::all();
    // }
