<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\FaqCatagory;

class Faq extends Model
{
    protected $fillable = [
        'question',
        'answer',
        'faq_category_id',
        'status',
        'position',
    ];

    public function category()
    {
        return $this->belongsTo(FaqCatagory::class, 'faq_category_id');
    }
}
