<?php
namespace App\Repositories\User\Order;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class OrderRepository implements OrderRepositoryInterface{
    public function makeOrder($data){
        $req_date = $data["req_date"];
        $user = Auth::user();
        $cart = Cart::where("user_id",$user["id"])->first();
        $items = CartItem::where("cart_id",$cart->id)->get();
        
        $order = Order::create([
            "require_date"=>$req_date,
            "user_id"=>$user["id"],
            "cart_id"=>$cart["id"],
            "total_price"=>1
        ]);
        $total_price=0;
        foreach($items as $item){
            
            OrderItem::create([
                "quantity"=>$item["quantity"],
                "price"=>$item["price"],
                "product_id"=>$item["product_id"],
                "order_id"=> $order["id"]
            ]);
            $total_price = $total_price + ($item["price"]*$item["quantity"]);

            $product = Product::find($item["product_id"]);

            $product->update([
                "quantity"=>$product["quantity"] - $item["quantity"] 
            ]);

        }
        $order->update([
            "total_price"=> $total_price
        ]);

        $cart->delete();
        
        return $order;
        
        
        

    }
}