<?php
namespace App\Repositories;

use App\Models\Category;
use App\Models\Product;

class ProductRepository
{
    public function find($id)
    {
        return Product::findOrFail($id);
    }

 public function store(array $product, $request)
    {
        // Image Upload
        if ($request->hasFile('image')) {
            $product['image'] = $request
                ->file('image')
                ->store('products', 'public');
        }

        return Product::create($product);
    }

public function show($id)
{
    return Category::findOrFail($id);
}

public function update(Product $product, array $data, $request = null)
{
    if ($request && $request->hasFile('image')) {

  

        $imagePath = $request->file('image')->store('products', 'public');

        $data['image'] = $imagePath;
    }

    $product->update($data);

    return $product->fresh();
}

    public function delete($id)
    {
        return Product::findOrFail($id)->delete();
    }

    public function all()
    {
        return Product::with('category')->latest()->get();
    }
}
