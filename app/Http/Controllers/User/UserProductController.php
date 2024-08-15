<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\User\product\UserProductService;
use Illuminate\Http\Request;


class UserProductController extends Controller
{
    public function __construct(
        protected  UserProductService $userProductService
    ) {}
    public function all()
    {
        $products = $this->userProductService->all();
        return view("User.AllProducts", compact("products"));
    }
    public function show($id)
    {
        [$category, $product] = $this->userProductService->show($id);

        return view("User.show", compact("product", "category"));
    }
    
}





// public function category(){
    //     $categories=$this->userProductService->category();
    //     dd($categories);
    //     return view("User.nav" , compact("categories"));
    //  }
    // public function filter($categoryId){
    //    $products =$this->userProductService->filter($categoryId);
    //    return view("User.All" , compact("products"));
    // }