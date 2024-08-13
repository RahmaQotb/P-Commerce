<?php
namespace App\Repositories\User\Order;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderRepository implements OrderRepositoryInterface{
    public function makeOrder($data){
        
        $user = Auth::user();
        $cart = Cart::where("user_id",$user["id"]);
        Order::create([
            "require_date"=>$data["require_date"],
            "user_id"=>$cart["user_id"],
            "product_id"=>$cart["product_id"],
            "quantity"=>$data["quantity"],
#           "total_price"=>$cart->product->price*$data["quantity"],
            "cart_id"=>$cart["id"]
        ]);
        $cart->delete();
        return "submitted";

    }
}