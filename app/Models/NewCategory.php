<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'order',
        'is_featured',
    ];
}
