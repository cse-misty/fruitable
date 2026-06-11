<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqCatagory extends Model
{
    protected $fillable = ['name', 'slug', 'status'];

    public function faqs()
{
    return $this->hasMany(Faq::class, 'faq_category_id');
}
}
