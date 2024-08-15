<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminProductRequest;
use App\Services\Admin\Product\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct(
        protected ProductService $productService
    ){

    }
    // public function testview(){
    //     return view("Admin.allProducts",compact("products"));
    // }
    public function allProducts(){
        // dd('Reached allProducts');  
        $products=$this->productService->allProducts();
        return view("Admin.allProducts",compact("products"));
    }
    public function create(){
        return view("Admin.create");
    }
    public function store(AdminProductRequest $request){
        $data = $request->validated();
        $data['image'] = Storage::putFile("Products" , $data['image']);
        $this->productService->store($data);

        return redirect(url("products/create"))->with("success","Product Inserted Successfully");
    }
    public function show($id){
       $product= $this->productService->show($id);
        return view("Admin.show",compact("product"));
    }
    public function edit($id){
    
        $product= $this->productService->edit($id);          
        return view("Admin.edit",compact("product"));
    }
    public function update(AdminProductRequest $request , $id){
        $data=$request->validated();
        $product = $this->productService->update($data,$id);
        return redirect(url("products/show/$id"))->with("success","Data Updated Successfully");

    }
    public function delete($id){
        $this->productService->delete($id);
        return redirect("products")->with("success","Product Deleted Successfully");
    }
}



