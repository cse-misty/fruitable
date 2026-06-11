<?php

namespace App\Repositories;

use App\Models\Faq;

class FaqRepository
{
    public function all($search = null)
    {
        $query = Faq::with('category');

        if ($search) {
            $query->where('question', 'like', '%' . $search . '%');
        }

        return $query->latest()->paginate(10);
    }

    public function findById($id)
    {
        return Faq::findOrFail($id);
    }

    public function store(array $faq)
    {
        return Faq::create($faq);
    }

    public function update($id, array $data)
    {
        $faq = $this->findById($id);
        $faq->update($data);

        return $faq;
    }

    public function delete($id)
    {
        return Faq::findOrFail($id)->delete();
    }
}
