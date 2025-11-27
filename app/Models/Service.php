<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'icon',
        'image',
        'summary',
        'content',
        'order',
        'is_featured',
    ];

    public function serviceDetails()
    {
        return $this->hasMany(ServiceDetail::class);
    }
}
