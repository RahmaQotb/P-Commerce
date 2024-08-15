<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminProductRequest;
use App\Models\Category;
use App\Services\Admin\Product\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct(
        protected ProductService $productService
    ) {}
    // public function testview(){
    //     return view("Admin.allProducts",compact("products"));
    // }
    public function allProducts()
    {
        // dd('Reached allProducts');
        $products = $this->productService->allProducts();
        return view("Admin.allProducts", compact("products"));
    }
    public function create()
    {
        $categories=$this->productService->getCategories();
        return view("Admin.CreateProduct", compact("categories"));
    }
    public function store(AdminProductRequest $request)
    {
        $data = $request->validated();
        $this->productService->store($data);

        return back()->with("success", "Product Inserted Successfully");
    }
    public function show($id)
    {
        $product = $this->productService->show($id);
        return view("Admin.show", compact("product"));
    }
    public function edit($id)
    {
        [$product, $categories] = $this->productService->edit($id);
        // if (!$product) {
        //     abort(404); 
        // }
        return view("Admin.edit", compact("product", "categories"));
    }
    
    public function update(AdminProductRequest $request, $id)
    {
        // dd('Update method reached');
        $data = $request->validated(); 
        $this->productService->update($data, $id); 
        // dd($id);
        return back()->with('success', 'Data Updated Successfully'); 
    }
    public function delete($id)
    {
        $this->productService->delete($id);
        return redirect("admin/products")->with("success", "Product Deleted Successfully");
    }
}
