<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSlider extends Model
{
    protected $fillable = [
        'sub_title', 'main_title', 'badge_text', 'text_one', 'text_two', 'image'
    ];


    protected $casts = [
        'image' => 'array',
    ];
}
