<?php
namespace App\Repositories\Admin\Category;

interface CategoryRepositoryInterface
{

    public function allCategories();
    public function create($data);
    public function store($data);
    public function edit($id);
    public function update($data, $id); 
    public function delete($id);
    public function show($id);
    public function trash();
    public function restore($id);
    public function forceDelete($id);

}