<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BlogPost extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'author',
        'featured_image',
        'tags',
        'categories',
        'status',
        'views_count',
        'reading_time',
        'meta_keywords',
        'meta_description',
        'published_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'tags' => 'array',
        'categories' => 'array',
        'meta_keywords' => 'array',
        'views_count' => 'integer',
        'reading_time' => 'integer',
        'published_at' => 'datetime',
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title);
            }
            
            // Calculate reading time if not set
            if (empty($post->reading_time) && !empty($post->content)) {
                $wordCount = str_word_count(strip_tags($post->content));
                $post->reading_time = max(1, ceil($wordCount / 200)); // Average reading speed: 200 words/minute
            }
        });
    }

    /**
     * Scope a query to only include published posts.
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'published')
                    ->whereNotNull('published_at')
                    ->where('published_at', '<=', now());
    }

    /**
     * Scope a query to only include draft posts.
     */
    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }

    /**
     * Scope a query to order posts by published date.
     */
    public function scopeLatest($query)
    {
        return $query->orderBy('published_at', 'desc');
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Increment the views count.
     */
    public function incrementViews()
    {
        $this->increment('views_count');
    }

    /**
     * Check if the post is published.
     */
    public function isPublished(): bool
    {
        return $this->status === 'published' 
            && $this->published_at !== null 
            && $this->published_at->lte(now());
    }
}
