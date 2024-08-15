<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        "require_date","total_price","user_id","cart_id"
    ];

    public function order_items(){
        return $this->hasMany(OrderItem::class);
    }
}
