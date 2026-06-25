<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

class ProductsImport implements ToModel, WithHeadingRow, SkipsEmptyRows
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // প্রধান ২টি ফিল্ড না থাকলে বাদ যাবে
        if (!isset($row['name']) || !isset($row['price'])) {
            return null;
        }

        return new Product([
            'name'            => $row['name'],
            'description'     => array_key_exists('description', $row) ? $row['description'] : null, // কি (key) না থাকলে null বসবে, এরর দেবে না
            'price'           => (float) $row['price'],
            'category_id'     => (int) $row['category_id'],
            'sub_category_id' => isset($row['sub_category_id']) ? (int) $row['sub_category_id'] : null,
            'image'           => $row['image'] ?? 'products/default.jpg',
            'status'          => $row['status'] ?? 1,
            'priority'        => isset($row['priority']) ? (int) $row['priority'] : 0,
            'sold_count'      => isset($row['sold_count']) ? (int) $row['sold_count'] : 0,
            'rating'          => isset($row['rating']) ? (float) $row['rating'] : 0.00,
            'review_count'    => isset($row['review_count']) ? (int) $row['review_count'] : 0,
        ]);
    }
}
