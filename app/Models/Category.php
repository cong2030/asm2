<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;

    /**
     * Quan hệ với model News
     */
    public function news()
    {
        return $this->hasMany(News::class, 'category_id', 'id');
    }
}