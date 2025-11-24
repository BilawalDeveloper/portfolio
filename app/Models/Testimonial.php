<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'role',
        'company',
        'company_url',
        'content',
        'avatar_url',
        'rating',
        'project_related',
        'featured',
        'approved',
        'order',
        'reviewed_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'rating' => 'integer',
        'featured' => 'boolean',
        'approved' => 'boolean',
        'order' => 'integer',
        'reviewed_at' => 'datetime',
    ];

    /**
     * Scope a query to only include featured testimonials.
     */
    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    /**
     * Scope a query to only include approved testimonials.
     */
    public function scopeApproved($query)
    {
        return $query->where('approved', true);
    }

    /**
     * Scope a query to order testimonials by order field.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc')->orderBy('reviewed_at', 'desc');
    }

    /**
     * Get the related project if exists.
     * Note: This uses a manual lookup since project_related stores a slug string
     * rather than a foreign key ID. Could be converted to a proper relationship
     * if project_related is changed to project_id in the migration.
     */
    public function getRelatedProjectAttribute()
    {
        if (!$this->project_related) {
            return null;
        }
        
        return Project::where('slug', $this->project_related)->first();
    }
}
