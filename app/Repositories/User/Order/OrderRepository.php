<?php
namespace App\Repositories\User\Order;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class OrderRepository implements OrderRepositoryInterface{

    public function myOrders(){
        $user_id = Auth::user()->id;
        return $orders = Order::where("user_id",$user_id)->get();
        
    }
    public function show($id){
        return OrderItem::where("order_id",$id)->get();
    }
    public function makeOrder($data){

        $validate = $data->validate([
            "req_data"=>"required|date"
        ]);
        $req_date = $validate["req_date"];
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
            $product = $item->product;
            
            OrderItem::create([
                "quantity"=>$item["quantity"],
                "price"=>$item["price"],
                "product_id"=>$item["product_id"],
                "order_id"=> $order["id"]
            ]);
            $total_price = $total_price + ($product->price*$item["quantity"]);


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