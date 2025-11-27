<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'image',
        'summary',
        'content',
        'new_category_id',
        'is_featured',
        'published_at',
    ];
}
