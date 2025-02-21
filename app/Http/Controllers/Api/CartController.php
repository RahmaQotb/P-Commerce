<?php 
namespace App\Http\Controllers\Api;

use App\Services\User\Cart\CartService;
use Illuminate\Http\Request;

class CartController{
    public function __construct(
        protected CartService $cartService
    ){}
    public function addToCart(Request $request , $id)
    {
        $msg = $this->cartService->addToCart($request,$id);
        return response()->json([
            'message' => $msg,
        ]);
        
        
    }
}