<?php

namespace App\Repositories\Admin\Product;

use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface{
    public function allProducts(){
       return Product::all();
    }
    public function create($data){
       return Product::create($data);
    }
    public function store($data){
       return Product::create($data);
    }
    public function show($id){
      return  Product::findOrFail($id);
    }
    public function update($data , $id){
        $product = Product::findOrFail($id);
        $product->update($data);
        return $product ;
    }
    public function edit($id){
        return Product::findOrFail($id);  
    }
    public function delete($id){
        $product = Product::findOrFail($id);
        $product->delete();
    }
   
}