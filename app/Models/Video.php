<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['title', 'file_path', 'category_id'];

    // Each video belongs to one category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
