<?php 
namespace App\Services\Admin\Category;

use App\Models\Category;

use app\Repositories\Admin\category\CategoryRepositoryInterface;


class categoryService{
    public function __construct(
        protected CategoryRepositoryInterface $categoryRepository){
     

        }
    public function allCategories(){
            return $this->categoryRepository->allCategories();
    } 
    public function create($data){
            return $this->categoryRepository->create($data);
    }
  
    public function update($id ,$data){
        return $this->categoryRepository->update($id , $data);
    }
    public function show($id){
        return $this->categoryRepository->show($id);
    }

    public function edit($id){
        return $this->categoryRepository->edit($id);
    }
    public function store($data){
        return $this->categoryRepository->store($data);
    }

    public function delete($id){
        return $this->categoryRepository->delete($id);
    }
    public function trash(){
        return $this->categoryRepository->trash();
      }
      public function restore($id){
        return $this->categoryRepository->restore($id);      }
      public function forceDelete($id){
        return $this->categoryRepository->forceDelete($id);      }
}