<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class ProjectPageContent extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'section_type',
        'content_data',
        'is_active',
        'order',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected function casts(): array
    {
        return [
            'content_data' => 'array',
            'is_active' => 'boolean',
        ];
    }

    /**
     * Section types constants
     */
    const SECTION_TYPES = [
        'hero_stats' => 'Hero Stats',
        'filter_buttons' => 'Filter Buttons',
        'project_types' => 'Project Types',
        'process_steps' => 'Process Steps',
        'cta_section' => 'CTA Section',
    ];

    /**
     * Get all active content for a specific section type
     *
     * @param string $sectionType
     * @return Collection
     */
    public static function getSectionContent(string $sectionType): Collection
    {
        return static::where('section_type', $sectionType)
                    ->where('is_active', true)
                    ->orderBy('order')
                    ->get();
    }

    /**
     * Get hero stats content
     *
     * @return array|null
     */
    public static function getHeroStats(): ?array
    {
        $content = static::getSectionContent('hero_stats')->first();
        return $content ? $content->content_data : null;
    }

    /**
     * Get filter buttons content
     *
     * @return Collection
     */
    public static function getFilterButtons(): Collection
    {
        return static::getSectionContent('filter_buttons');
    }

    /**
     * Get project types content
     *
     * @return Collection
     */
    public static function getProjectTypes(): Collection
    {
        return static::getSectionContent('project_types');
    }

    /**
     * Get process steps content
     *
     * @return Collection
     */
    public static function getProcessSteps(): Collection
    {
        return static::getSectionContent('process_steps');
    }

    /**
     * Get CTA section content
     *
     * @return array|null
     */
    public static function getCtaSection(): ?array
    {
        $content = static::getSectionContent('cta_section')->first();
        return $content ? $content->content_data : null;
    }

    /**
     * Scope for active content
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for specific section type
     */
    public function scopeOfType($query, string $sectionType)
    {
        return $query->where('section_type', $sectionType);
    }

    /**
     * Scope for ordered content
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
}