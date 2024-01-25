<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id', 'image_path', 'number_list',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
