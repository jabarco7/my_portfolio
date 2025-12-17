<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class AboutPageContent extends Model
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
        'hero_section' => 'Hero Section',
        'social_section' => 'Social Media Section',
        'skills_section' => 'Skills Section',
        'experience_section' => 'Experience Timeline',
        'education_section' => 'Education Timeline',
        'cta_section' => 'Call-to-Action Section',
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
     * Get hero section content
     *
     * @return array|null
     */
    public static function getHeroSection(): ?array
    {
        $content = static::getSectionContent('hero_section')->first();
        return $content ? $content->content_data : null;
    }

    /**
     * Get social section content
     *
     * @return array|null
     */
    public static function getSocialSection(): ?array
    {
        $content = static::getSectionContent('social_section')->first();
        return $content ? $content->content_data : null;
    }

    /**
     * Get skills section content
     *
     * @return Collection
     */
    public static function getSkillsSection(): Collection
    {
        return static::getSectionContent('skills_section');
    }

    /**
     * Get experience timeline content
     *
     * @return Collection
     */
    public static function getExperienceSection(): Collection
    {
        return static::getSectionContent('experience_section');
    }

    /**
     * Get education timeline content
     *
     * @return Collection
     */
    public static function getEducationSection(): Collection
    {
        return static::getSectionContent('education_section');
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
