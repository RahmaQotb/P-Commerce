<?php
namespace App\Services\Admin\Product;

use App\Repositories\Admin\Product\ProductRepositoryInterface;

class ProductService{
    public function __construct(
        protected ProductRepositoryInterface $productRepository){
     

        }
    public function allProducts(){
            return $this->productRepository->allProducts();
    } 
    public function create($data){
            return $this->productRepository->create($data);
    }
  
    public function update($id ,$data){
        return $this->productRepository->update($id , $data);
    }
    public function show($id){
        return $this->productRepository->show($id);
    }

    public function edit($id){
        return $this->productRepository->edit($id);
    }
    public function store($data){
        return $this->productRepository->store($data);
    }

    public function delete($id){
        return $this->productRepository->delete($id);
    }
}