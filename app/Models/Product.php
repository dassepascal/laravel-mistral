<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
       'sold',
        'image',
        'price',
        'seo_title',
        'meta_description',
        'meta_keywords'
    ];

    public function imageUrl()
    {
        return $this->image ? asset('storage/' . $this->image) : asset('images/default.jpg');
    }
    
}
