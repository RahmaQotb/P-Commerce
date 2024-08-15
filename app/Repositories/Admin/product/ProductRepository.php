<?php

namespace App\Repositories\Admin\Product;

use App\Models\Category;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function allProducts()
    {
        return Product::all();
    }
    public function create($data)
    {
        // $categories = Category::all();

        $product = Product::create($data);
        // return [$product,$categories];
        return $product;
    }   
    public function getCategories(){
        $categories = Category::all();
        return $categories;
    }
    public function store($data)
    {
        $product = Product::create($data);
        $product->addMedia($data['image'])->toMediaCollection('images');
        return $product;
    }
    public function show($id)
    {
        return  Product::findOrFail($id);
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all(); 
        return [$product, $categories];
    }
    
    public function update($data, $id)
    {
        $product = Product::findOrFail($id); 
    
        if (isset($data['image'])) { 
            if ($product->hasMedia('images')) {
                $product->clearMediaCollection('images'); 
            }
            $product->addMedia($data['image'])->toMediaCollection('images'); 
        }
    
        $product->update($data); 
    
        return $product; 
    }
    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
    }
}
