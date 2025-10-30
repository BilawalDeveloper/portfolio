<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'image',
        'technologies',
        'github_url',
        'demo_url',
        'dataset_size',
        'model_architecture',
        'impact',
        'metrics',
        'order',
        'featured',
        'is_published',
        'country_visibility',
    ];

    protected $casts = [
        'technologies' => 'array',
        'metrics' => 'array',
        'country_visibility' => 'array',
        'featured' => 'boolean',
        'is_published' => 'boolean',
    ];
}
