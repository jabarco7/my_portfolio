<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Project extends Model
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
        'description',
        'client',
        'start_date',
        'end_date',
        'project_url',
        'github_url',
        'featured_image',
        'is_featured',
        'is_active',
        'order',
        'category_id',
        'challenges',
        'solutions',
        'results',
        'hero_content',
        'project_details_content',
        'explore_more_content',
        'share_content',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'challenges' => 'array',
            'solutions' => 'array',
            'results' => 'array',
            'hero_content' => 'array',
            'project_details_content' => 'array',
            'explore_more_content' => 'array',
            'share_content' => 'array',
        ];
    }

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($project) {
            if (empty($project->slug)) {
                $project->slug = static::generateUniqueSlug($project->title);
            }
        });

        static::updating(function ($project) {
            if ($project->isDirty('title') && empty($project->slug)) {
                $project->slug = static::generateUniqueSlug($project->title);
            }
        });
    }

    /**
     * Generate a unique slug for the project.
     */
    protected static function generateUniqueSlug($title)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 1;

        while (static::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }

    /**
     * Get the images for the project.
     */
    public function images(): HasMany
    {
        return $this->hasMany(ProjectImage::class)->orderBy('order');
    }

    /**
     * Get the featured image for the project.
     */
    public function featuredImage()
    {
        return $this->hasOne(ProjectImage::class)->where('is_featured', true);
    }

    /**
     * Get the tags for the project.
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'project_tag');
    }

    /**
     * Get the category for the project.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the URL for the project.
     */
    public function getUrlAttribute()
    {
        return route('projects.show', $this->slug);
    }
}
