<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Stripe extends Model
{
    use HasFactory;


    protected $table = 'stripes';


    protected $fillable = [
        'product_id',
        'image',
        'name',
        'title',
        'mode',
        'secret_key',
        'published_key',
        'payment_gateway_title',
    ];

   
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
