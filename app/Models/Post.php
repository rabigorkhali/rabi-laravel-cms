<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_category_id',
        'title',
        'slug',
        'seo_title',
        'body',
        'image',
        'status',
    ];

    /**
     * Define the relationship with the post category.
     */
    public function category()
    {
        return $this->belongsTo(PostCategory::class, 'post_category_id');
    }
}
