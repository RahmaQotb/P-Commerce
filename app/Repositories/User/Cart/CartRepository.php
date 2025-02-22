<?php
namespace App\Repositories\User\Cart;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartRepository implements CartRepositoryInterface{
    
    public function myCart(){
        $user_id = Auth::user()->id;
        $cart = Cart::with('cart_items.product')->where("user_id",$user_id)->first  ();
        if(!$cart){
            return collect(); // if there is not a cart it will return an empty collection
        }
        return $cart;
    }

    public function addToCart(Request $request ,$id){

        $product = Product::findOrFail($id);
        $qty = $product->quantity;
        
        $user_id = auth()->user()->id;

        $cart = Cart::where("user_id",$user_id)->first();

        if(!$cart && (($qty - $request->quantity) >=0) ){

            $cart = Cart::create([
                "user_id" =>$user_id
            ]);

            CartItem::create([
                "quantity" => $request->quantity,
                "product_id"=>$product["id"],
                "price"=>$product["price"],
                "cart_id"=> $cart["id"]
            ]);
        // $product->update([
        //     "quantity" => $qty - $data->quantity 
        // ]);
        // return $msg = "Your Product Added to Cart Successfully";
        }

        elseif($cart && (($qty - $request->quantity) >=0)){
            $cart_item = CartItem::where("cart_id",$cart["id"])->where("product_id",$product["id"])->first();
            if($cart_item){
                $cart_item->update([
                    "quantity" => $cart_item->quantity + 1
                ]);
                // $product->update([
                //     "quantity"=> $qty - $data->quantity 
                // ]);
                return  "Product Added To Your Cart";
            
            
            }else{
                CartItem::create([
                    "quantity" => 1,
                    "product_id"=>$product["id"],
                    "price"=>$product["price"],
                    "cart_id"=> $cart["id"]
                ]);
                // $product->update([
                //     "quantity"=> $qty - $data->quantity 
                // ]);
                return $msg ="Product Added To Your Cart";
            }
        }
        else{
            return $msg ="Enter a valid quantity number";
        }


    }
}