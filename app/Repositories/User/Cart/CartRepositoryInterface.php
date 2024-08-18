<?php 

namespace App\Repositories\User\Cart;

interface CartRepositoryInterface{
    public function myCart();
    public function addToCart($data ,$id);
}