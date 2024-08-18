<?php

namespace App\Services\User\product;

use App\Repositories\User\Product\UserProductRepositoryInterface;

class UserProductService
{
    public  function __construct(
        protected UserProductRepositoryInterface $userProductRepositoryInterface
    ) {}

    public function all()
    {
        return $this->userProductRepositoryInterface->all();
    }
    public function show($id)
    {
        return $this->userProductRepositoryInterface->show($id);
    }
        public function filter($categoryId)
    {
        return $this->userProductRepositoryInterface->filter($categoryId);
    }
}








// public function category()
//     {
//         return $this->userProductRepositoryInterface->category();
//     }

