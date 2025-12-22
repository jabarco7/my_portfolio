<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SkillsPageContent;
use Illuminate\Http\Request;

class SkillsPageContentController extends Controller
{
    /**
     * Display the skills page content management page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Get content for each section
        $heroData = SkillsPageContent::getHeroSection();
        $skillsListData = SkillsPageContent::getSkillsListSection();
        $methodologiesData = SkillsPageContent::getMethodologiesSection();
        $ctaData = SkillsPageContent::getCtaSection();
        $statsData = SkillsPageContent::getStatsSection();
        
        // Create objects from data
        $heroContent = new SkillsPageContent();
        if ($heroData) {
            $heroContent->badge_text = $heroData['badge_text'];
            $heroContent->title = $heroData['title'];
            $heroContent->subtitle = $heroData['subtitle'];
            $heroContent->description = $heroData['description'];
            $heroContent->button_text = $heroData['button_text'];
            $heroContent->button_link = $heroData['button_link'];
        }
        
        $skillsListContent = new SkillsPageContent();
        if ($skillsListData) {
            $skillsListContent->badge_text = $skillsListData['badge_text'];
            $skillsListContent->title = $skillsListData['title'];
            $skillsListContent->subtitle = $skillsListData['subtitle'];
            $skillsListContent->description = $skillsListData['description'];
        }
        
        $methodologiesContent = new SkillsPageContent();
        if ($methodologiesData) {
            $methodologiesContent->badge_text = $methodologiesData['badge_text'];
            $methodologiesContent->title = $methodologiesData['title'];
            $methodologiesContent->subtitle = $methodologiesData['subtitle'];
        }
        
        $ctaContent = new SkillsPageContent();
        if ($ctaData) {
            $ctaContent->title = $ctaData['title'];
            $ctaContent->subtitle = $ctaData['subtitle'];
            $ctaContent->description = $ctaData['description'];
            $ctaContent->button_text = $ctaData['button_text'];
            $ctaContent->button_link = $ctaData['button_link'];
        }
        
        $statsContent = new SkillsPageContent();
        if ($statsData) {
            $statsContent->technologies_count = $statsData['technologies_count'];
            $statsContent->expert_level = $statsData['expert_level'];
            $statsContent->up_to_date_percentage = $statsData['up_to_date_percentage'];
        }


        return view('admin.skills.skills-page-content', compact(
            'heroContent',
            'skillsListContent',
            'methodologiesContent',
            'ctaContent',
            'statsContent'
        ));
    }

    /**
     * Update the skills page content.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        // Validate request data
        $request->validate([
            'hero.badge_text' => 'nullable|string|max:100',
            'hero.title' => 'nullable|string|max:100',
            'hero.subtitle' => 'nullable|string|max:100',
            'hero.description' => 'nullable|string|max:500',
            'hero.button_text' => 'nullable|string|max:50',
            'hero.button_link' => 'nullable|string|max:255',

            'skills_list.badge_text' => 'nullable|string|max:100',
            'skills_list.title' => 'nullable|string|max:100',
            'skills_list.subtitle' => 'nullable|string|max:100',
            'skills_list.description' => 'nullable|string|max:500',

            'methodologies.badge_text' => 'nullable|string|max:100',
            'methodologies.title' => 'nullable|string|max:100',
            'methodologies.subtitle' => 'nullable|string|max:100',

            'cta.title' => 'nullable|string|max:100',
            'cta.subtitle' => 'nullable|string|max:100',
            'cta.description' => 'nullable|string|max:500',
            'cta.button_text' => 'nullable|string|max:50',
            'cta.button_link' => 'nullable|string|max:255',
            
            'stats.technologies_count' => 'nullable|string|max:20',
            'stats.expert_level' => 'nullable|string|max:20',
            'stats.up_to_date_percentage' => 'nullable|string|max:20',
        ]);

        // Update hero content
        $this->updateSection('hero', $request->input('hero', []));

        // Update skills list content
        $this->updateSection('skills_list', $request->input('skills_list', []));

        // Update methodologies content
        $this->updateSection('methodologies', $request->input('methodologies', []));

        // Update CTA content
        $this->updateSection('cta', $request->input('cta', []));
        
        // Update stats content
        $this->updateSection('stats', $request->input('stats', []));

        return redirect()->route('admin.skills-page-content')
            ->with('success', 'Skills page content updated successfully!');
    }

    /**
     * Update a specific section content.
     *
     * @param string $section
     * @param array $data
     * @return void
     */
    private function updateSection(string $section, array $data)
    {
        $content = SkillsPageContent::where('section', $section)->first();

        if (!$content) {
            $content = new SkillsPageContent();
            $content->section = $section;
        }

        $content->title = $data['title'] ?? null;
        $content->subtitle = $data['subtitle'] ?? null;
        $content->description = $data['description'] ?? null;
        $content->badge_text = $data['badge_text'] ?? null;
        $content->button_text = $data['button_text'] ?? null;
        $content->button_link = $data['button_link'] ?? null;
        $content->technologies_count = $data['technologies_count'] ?? null;
        $content->expert_level = $data['expert_level'] ?? null;
        $content->up_to_date_percentage = $data['up_to_date_percentage'] ?? null;
        $content->is_active = true;

        $content->save();
    }
}
