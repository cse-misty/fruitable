<?php

namespace App\Repositories;

use App\Models\FaqCatagory;

class FaqCatagoryRepository
{
    public function all($search = null)
    {
        $query = FaqCatagory::query();

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        return $query->latest()->paginate(4);
    }

    public function findById($id)
    {
        return FaqCatagory::findOrFail($id);
    }

    public function store(array $faqCatagory)
    {
        return FaqCatagory::create($faqCatagory);
    }
public function update($id, array $data)
{
    $faqCatagory = $this->findById($id);
    $faqCatagory->update($data);

    return $faqCatagory;
}

    public function delete($id)
    {
        $faqCatagory = $this->findById($id);
        return $faqCatagory->delete();
    }
}
