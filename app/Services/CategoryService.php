<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class CategoryService
{
     public function getFeaturedCategories($limit = 3)
    {
        return Category::query()
            ->where('status', 1)
            ->latest()
            ->take($limit)
            ->get();
    }
    public function uploadImage($image)
    {
        $imageName = time().'.'.$image->extension();
        $thumbnailName = 'thumb_'.$imageName;


        $image->storeAs('categories', $imageName, 'public');


        $thumbnail = Image::decode($image);


        $thumbnail->resize(300, 300);


        $extension = $image->extension();
        $encodedThumbnail = $thumbnail->encodeUsingFileExtension($extension, quality: 80);


        Storage::disk('public')->put(
            'categories/thumbnails/'.$thumbnailName,
            $encodedThumbnail->toString()
        );

        return [
            'image' => 'categories/'.$imageName,
            'thumbnail' => 'categories/thumbnails/'.$thumbnailName,
        ];
    }
}
