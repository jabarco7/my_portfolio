<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectDetailContent extends Model
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
        'links_title',
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
            'badge_text' => $content->badge_text ?? 'Project Case Study',
            'title' => $content->title ?? 'Project Details',
            'subtitle' => $content->subtitle ?? null,
            'description' => $content->description ?? null,
        ] : [
            'badge_text' => 'Project Case Study',
            'title' => 'Project Details',
            'subtitle' => null,
            'description' => null,
        ];
    }

    /**
     * Get gallery section content
     *
     * @return array|null
     */
    public static function getGallerySection(): ?array
    {
        $content = static::where('section', 'gallery')
            ->where('is_active', true)
            ->first();

        return $content ? [
            'title' => $content->title ?? 'Project Gallery',
            'subtitle' => $content->subtitle ?? 'Visual showcase of the project',
        ] : [
            'title' => 'Project Gallery',
            'subtitle' => 'Visual showcase of the project',
        ];
    }

    /**
     * Get features section content
     *
     * @return array|null
     */
    public static function getFeaturesSection(): ?array
    {
        $content = static::where('section', 'features')
            ->where('is_active', true)
            ->first();

        return $content ? [
            'title' => $content->title ?? 'Key Features',
            'subtitle' => $content->subtitle ?? 'Notable functionalities and capabilities',
        ] : [
            'title' => 'Key Features',
            'subtitle' => 'Notable functionalities and capabilities',
        ];
    }

    /**
     * Get project details section content
     *
     * @return array|null
     */
    public static function getProjectDetailsSection(): ?array
    {
        $content = static::where('section', 'project_details')
            ->where('is_active', true)
            ->first();

        return $content ? [
            'title' => $content->title ?? 'Project Details',
            'technologies_title' => $content->technologies_title ?? 'Technologies Used',
            'category_title' => $content->category_title ?? 'Category',
            'client_title' => $content->client_title ?? 'Client',
            'date_title' => $content->date_title ?? 'Project Date',
            'status_title' => $content->status_title ?? 'Project Status',
            'links_title' => $content->links_title ?? 'Project Links',
        ] : [
            'title' => 'Project Details',
            'technologies_title' => 'Technologies Used',
            'category_title' => 'Category',
            'client_title' => 'Client',
            'date_title' => 'Project Date',
            'status_title' => 'Project Status',
            'links_title' => 'Project Links',
        ];
    }

    /**
     * Get explore more section content
     *
     * @return array|null
     */
    public static function getExploreMoreSection(): ?array
    {
        $content = static::where('section', 'explore_more')
            ->where('is_active', true)
            ->first();

        return $content ? [
            'title' => $content->title ?? 'Explore More Projects',
            'subtitle' => $content->subtitle ?? 'Check out other projects in my portfolio',
            'button_text' => $content->button_text ?? 'View Portfolio',
        ] : [
            'title' => 'Explore More Projects',
            'subtitle' => 'Check out other projects in my portfolio',
            'button_text' => 'View Portfolio',
        ];
    }

    /**
     * Get share section content
     *
     * @return array|null
     */
    public static function getShareSection(): ?array
    {
        $content = static::where('section', 'share')
            ->where('is_active', true)
            ->first();

        return $content ? [
            'title' => $content->title ?? 'Share Project',
        ] : [
            'title' => 'Share Project',
        ];
    }

    /**
     * Get challenges section content
     *
     * @return array|null
     */
    public static function getChallengesSection(): ?array
    {
        $content = static::where('section', 'challenges')
            ->where('is_active', true)
            ->first();

        return $content ? [
            'badge_text' => $content->badge_text ?? 'Development Insights',
            'title' => $content->title ?? 'Challenges & Solutions',
            'subtitle' => $content->subtitle ?? 'Every project comes with unique challenges. Here\'s how we solved them.',
            'challenges_title' => $content->challenges_title ?? 'Key Challenges',
            'solutions_title' => $content->solutions_title ?? 'Implemented Solutions',
        ] : [
            'badge_text' => 'Development Insights',
            'title' => 'Challenges & Solutions',
            'subtitle' => $content->subtitle ?? 'Every project comes with unique challenges. Here\'s how we solved them.',
            'challenges_title' => 'Key Challenges',
            'solutions_title' => 'Implemented Solutions',
        ];
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
            'title' => $content->title ?? 'Like What You See?',
            'subtitle' => $content->subtitle ?? 'Let\'s Work Together',
            'description' => $content->description ?? 'Ready to bring your next project to life with the same quality and attention to detail?',
            'button_text' => $content->button_text ?? 'Start a Project',
            'button_link' => $content->button_link ?? route('contact'),
        ] : [
            'title' => 'Like What You See?',
            'subtitle' => 'Let\'s Work Together',
            'description' => 'Ready to bring your next project to life with the same quality and attention to detail?',
            'button_text' => 'Start a Project',
            'button_link' => route('contact'),
        ];
    }
}