<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'content', 'views', 'category_id', 'image'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}