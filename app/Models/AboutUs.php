<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;


    protected $table = 'about_us';

    protected $fillable = [
        'sub_title',
        'title',
        'description_top',
        'description_bottom',
        'image',
        'experience_year',
        'experience_text',
        'mission_title',
        'mission_description',
        'vision_title',
        'vission_description',
        'core_value_title',
        'core_value_description',
        'status',
        'feature_one_icon','feature_one_title','feature_two_icon',
        'feature_two_title','about_title','about_name',
    ];
}
