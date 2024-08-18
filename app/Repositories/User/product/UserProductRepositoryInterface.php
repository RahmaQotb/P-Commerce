<?php

namespace App\Repositories\User\Product;

interface UserProductRepositoryInterface
{

    public function all();
    public function show($id);
    
public function filter($categoryId);
}
//     public function category();


















