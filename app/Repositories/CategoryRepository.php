<?php
namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
       public static function model()
    {
        return Category::class;
    }


    public function find($id)
    {

        return Category::find($id); 
    }

    public function store(array $category)
    {
        return Category::create($category);
    }

    public function update(Category $category, array $data)
    {
        return $category->update($data);
    }

    public function delete(Category $category)
    {
        return $category->delete();
    }
}
