<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Tag extends Model
{
    protected $table = 'project_tags';

    protected $fillable = [
        'name',
        'slug',
        'color',
    ];

    protected $casts = [
        'color' => 'string',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($tag) {
            if (empty($tag->slug)) {
                $tag->slug = Str::slug($tag->name);
            }
        });

        static::updating(function ($tag) {
            if ($tag->isDirty('name') && empty($tag->slug)) {
                $tag->slug = Str::slug($tag->name);
            }
        });
    }

    /**
     * Get the projects for the tag.
     */
    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class, 'project_tag');
    }
}
