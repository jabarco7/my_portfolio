<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillsPageContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'section',
        'title',
        'subtitle',
        'description',
        'badge_text',
        'button_text',
        'button_link',
        'is_active',
        'order',
        'technologies_count',
        'expert_level',
        'up_to_date_percentage',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get hero section content
     *
     * @return array|null
     */
    public static function getHeroSection(): ?array
    {
        $content = static::where('section', 'hero')
            ->where('is_active', true)
            ->first();

        return $content ? [
            'badge_text' => $content->badge_text ?? 'Technical Expertise',
            'title' => $content->title ?? 'My Technical',
            'subtitle' => $content->subtitle ?? 'Skills & Tools',
            'description' => $content->description ?? 'Over the years, I\'ve cultivated a diverse skill set that spans both frontend and backend development. I believe in using the right tool for the job and continuously expanding my knowledge.',
            'button_text' => $content->button_text ?? 'Explore Skills',
            'button_link' => $content->button_link ?? '#skills-list',
        ] : null;
    }

    /**
     * Get skills list section content
     *
     * @return array|null
     */
    public static function getSkillsListSection(): ?array
    {
        $content = static::where('section', 'skills_list')
            ->where('is_active', true)
            ->first();

        return $content ? [
            'badge_text' => $content->badge_text ?? 'Comprehensive Overview',
            'title' => $content->title ?? 'Technical Skills',
            'subtitle' => $content->subtitle ?? 'Matrix',
            'description' => $content->description ?? 'A detailed breakdown of my technical skills across different categories and proficiency levels.',
        ] : null;
    }

    /**
     * Get methodologies section content
     *
     * @return array|null
     */
    public static function getMethodologiesSection(): ?array
    {
        $content = static::where('section', 'methodologies')
            ->where('is_active', true)
            ->first();

        return $content ? [
            'badge_text' => $content->badge_text ?? 'Methodologies & Practices',
            'title' => $content->title ?? 'Development',
            'subtitle' => $content->subtitle ?? 'Methodologies',
        ] : null;
    }

    /**
     * Get CTA section content
     *
     * @return array|null
     */
    public static function getCtaSection(): ?array
    {
        $content = static::where('section', 'cta')
            ->where('is_active', true)
            ->first();

        return $content ? [
            'title' => $content->title ?? 'Need a Specific',
            'subtitle' => $content->subtitle ?? 'Skill Set?',
            'description' => $content->description ?? 'Whether you need expertise in a specific technology or a combination of skills, I\'m ready to tackle your project challenges.',
            'button_text' => $content->button_text ?? 'Discuss Your Project',
            'button_link' => $content->button_link ?? route('contact'),
        ] : null;
    }
    
    /**
     * Get stats section content
     *
     * @return array|null
     */
    public static function getStatsSection(): ?array
    {
        $content = static::where('section', 'stats')
            ->where('is_active', true)
            ->first();

        return $content ? [
            'technologies_count' => $content->technologies_count ?? '25+',
            'expert_level' => $content->expert_level ?? '8/10',
            'up_to_date_percentage' => $content->up_to_date_percentage ?? '100%',
        ] : [
            'technologies_count' => '25+',
            'expert_level' => '8/10',
            'up_to_date_percentage' => '100%',
        ];
    }
}
