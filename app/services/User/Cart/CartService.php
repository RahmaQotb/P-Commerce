<?php
namespace App\Services\User\Cart;
use App\Repositories\User\Cart\CartRepositoryInterface;

class CartService{
    public function __construct(
        protected CartRepositoryInterface $cartRepositoryInterface
    ){}

    public function myCart(){
        return $this->cartRepositoryInterface->myCart();
    }

    public function addToCart($data,$id){
        return $this->cartRepositoryInterface->addToCart($data,$id);
    }
}