<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebSetting extends Model
{
    use HasFactory;

    protected $table = 'web_settings';

    
    protected $guarded = [];


    public function getHeaderLogoUrlAttribute()
    {
        return $this->logo_header ? asset('storage/' . $this->logo_header) : asset('images/default-logo.png');
    }

    public function getFaviconUrlAttribute()
    {
        return $this->favicon ? asset('storage/' . $this->favicon) : asset('images/default-favicon.png');
    }
}
