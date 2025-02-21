<?php

namespace App\Listeners;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class DetuctProductQuantity
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(): void
    {
        foreach(CartItem::get() as $item){
            Product::where("id" , "=" , $item->product_id)->update([
                
                    "quantity" => DB::raw("quantity -" . $item->quantity)
                
            ]);
        }
    }
}
