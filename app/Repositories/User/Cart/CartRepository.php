<?php
namespace App\Repositories\User\Cart;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Request;

class CartRepository implements CartRepositoryInterface{
    
    public function myCart(){
        $user_id = Auth::user()->id;
        $cart = Cart::where("user_id",$user_id)->get();
        return $cart;
    }

    public function addToCart($data, $id){

        $product = Product::findOrFail($id);
        $qty = $product->quantity;
        
        $user_id = auth()->user()->id;

        $cart = Cart::where("user_id",$user_id)->first();

        if(!$cart && (($qty - $data->quantity) >=0) ){

            $cart = Cart::create([
                "user_id" =>$user_id
            ]);

            CartItem::create([
                "quantity" => $data->quantity,
                "product_id"=>$product["id"],
                "price"=>$product["price"],
                "cart_id"=> $cart["id"]
            ]);
        $product->update([
            "quantity"=> $qty - $data->quantity 
        ]);
        // return $msg = "Your Product Added to Cart Successfully";
        }

        elseif($cart && (($qty - $data->quantity) >=0)){
            $cart_items = CartItem::where("cart_id",$cart["id"])->where("product_id",$product["id"])->first();
            if($cart_items){
                $cart_items->update([
                    "quantity" => $cart_items + $data->quantity 
                ]);
                $product->update([
                    "quantity"=> $qty - $data->quantity 
                ]);
                return  "Product Added To Your Cart";
            
            
            }else{
                CartItem::create([
                    "quantity" => $data->quantity,
                    "product_id"=>$product["id"],
                    "price"=>$product["price"],
                    "cart_id"=> $cart["id"]
                ]);
                $product->update([
                    "quantity"=> $qty - $data->quantity 
                ]);
                return $msg ="Product Added To Your Cart";
            }
        }
        else{
            return $msg ="Enter a valid quantity number";
        }


    }
}