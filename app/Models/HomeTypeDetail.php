<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeTypeDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'home_type_id',
        'name',
        'slug',
        'image',
        'summary',
        'content',
        'is_featured',
        'order',
        'investor',
        'project_type',
        'land_area',
        'construction_area',
        'floors',
        'features',
        'address',
        'contract_type',
        'year',
    ];

    public function homeType()
    {
        return $this->belongsTo(HomeType::class);
    }
}
