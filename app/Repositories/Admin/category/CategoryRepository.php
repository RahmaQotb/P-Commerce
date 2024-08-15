<?php
namespace App\Repositories\Admin\Category;

use App\Models\Category;
use App\Models\Product;
use App\Repositories\Admin\category\CategoryRepositoryInterface;


class CategoryRepository implements CategoryRepositoryInterface{
    public function allCategories(){
       return Category::all();
    }
    public function create($data){
       return Category::create($data);
    }
    public function store($data){
       return Category::create($data);
    }
    public function show($id){
      return Category::findOrFail($id);
    }
    public function update($data , $id){
        $category = Category::findOrFail($id);
        $category->update($data);
        return $category ;
    }
    public function edit($id){
        return Category::findOrFail($id);  
    }
    public function delete($id){
        $category = Category::findOrFail($id);
        $category->delete();
    }
   
}