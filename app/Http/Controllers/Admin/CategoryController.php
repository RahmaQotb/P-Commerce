<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\services\Admin\Category\categoryService;
use App\Http\Requests\AdminCategoryRequest;
class CategoryController extends Controller
{
    public function __construct(
        protected categoryService $categoryService
    ){

    }
  
    public function allCategories(){
        $categories=$this->categoryService->allCategories();
        return view("Admin.allCategories",compact("categories"));
    }
    public function create(){
        return view("Admin.createCategory");
    }
    public function store(AdminCategoryRequest $request){
        $data = $request->validated();
        $this->categoryService->store($data);

        return redirect(url("admin/categories/create"))->with('success',"Data Inserted Successfully");
    }
    public function edit($id){
        $category=$this->categoryService->edit($id);
        return view('Admin.editCategory' , compact("category"));
    }
    public function update(AdminCategoryRequest $request , $id){
        $data=$request->validated();
        $this->categoryService->update($data,$id);
        return redirect(url("admin/categories/show/$id"))->with('success',"Data Updated Successfully");
    } 
    public function delete($id){
        $this->categoryService->delete($id);
        return redirect("admin/categories")->with("success","Category Deleted Successfully");   
    }
    public function show($id){
        $category= $this->categoryService->show($id);
        return view("Admin.showCategory" , compact("category"));

    }
}