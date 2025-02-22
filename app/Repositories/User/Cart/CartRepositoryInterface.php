<?php 

namespace App\Repositories\User\Cart;

use Illuminate\Http\Request;

interface CartRepositoryInterface{
    public function myCart();
    public function addToCart(Request $request ,$id);
}