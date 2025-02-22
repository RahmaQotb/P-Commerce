<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Services\User\Cart\CartService;
use Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct(
        protected CartService $cartService
    ){}

    public function myCart()
    {
        $cart= $this->cartService->myCart();
        return view("User.Cart.myCart",compact("cart"));
    }

    public function addToCart(Request $request , $id)
    {
        $msg = $this->cartService->addToCart($request,$id);
        return response()->json([
            'message' => $msg,
        ]);
        
        
    }
}
