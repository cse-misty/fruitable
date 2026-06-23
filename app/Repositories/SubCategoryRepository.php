<?php

namespace App\Repositories;

use App\Models\SubCategory;

class SubCategoryRepository
{
    public function getAll($search = null)
    {
        $query = SubCategory::query();

        if ($search) {
            $query->where('title', 'like', '%' . $search . '%');
        }

        return $query->latest()->paginate(10);
    }


    public function find($id)
    {
        return SubCategory::findOrFail($id);
    }

    public function create(array $data)
    {
        return SubCategory::create($data);
    }

    public function update($id, array $data)
    {
        $subCategory = SubCategory::findOrFail($id);
        return $subCategory->update($data);
    }

    public function delete($id)
    {
        return SubCategory::destroy($id);
    }
}
