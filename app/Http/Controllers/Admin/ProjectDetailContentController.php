<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectDetailContent;
use Illuminate\Http\Request;

class ProjectDetailContentController extends Controller
{
    /**
     * Show the form for editing the project detail page content.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Get content for each section
        $heroData = ProjectDetailContent::getHeroSection();
        $galleryData = ProjectDetailContent::getGallerySection();
        $featuresData = ProjectDetailContent::getFeaturesSection();
        $projectDetailsData = ProjectDetailContent::getProjectDetailsSection();
        $exploreMoreData = ProjectDetailContent::getExploreMoreSection();
        $shareData = ProjectDetailContent::getShareSection();
        $challengesData = ProjectDetailContent::getChallengesSection();
        $ctaData = ProjectDetailContent::getCtaSection();

        // Create objects from data
        $heroContent = new ProjectDetailContent();
        if ($heroData) {
            $heroContent->badge_text = $heroData['badge_text'];
            $heroContent->title = $heroData['title'];
            $heroContent->subtitle = $heroData['subtitle'];
            $heroContent->description = $heroData['description'];
        }

        $galleryContent = new ProjectDetailContent();
        if ($galleryData) {
            $galleryContent->title = $galleryData['title'];
            $galleryContent->subtitle = $galleryData['subtitle'];
        }

        $featuresContent = new ProjectDetailContent();
        if ($featuresData) {
            $featuresContent->title = $featuresData['title'];
            $featuresContent->subtitle = $featuresData['subtitle'];
        }

        $projectDetailsContent = new ProjectDetailContent();
        if ($projectDetailsData) {
            $projectDetailsContent->title = $projectDetailsData['title'];
            $projectDetailsContent->technologies_title = $projectDetailsData['technologies_title'];
            $projectDetailsContent->category_title = $projectDetailsData['category_title'];
            $projectDetailsContent->client_title = $projectDetailsData['client_title'];
            $projectDetailsContent->date_title = $projectDetailsData['date_title'];
            $projectDetailsContent->status_title = $projectDetailsData['status_title'];
            $projectDetailsContent->links_title = $projectDetailsData['links_title'];
        }

        $exploreMoreContent = new ProjectDetailContent();
        if ($exploreMoreData) {
            $exploreMoreContent->title = $exploreMoreData['title'];
            $exploreMoreContent->subtitle = $exploreMoreData['subtitle'];
            $exploreMoreContent->button_text = $exploreMoreData['button_text'];
        }

        $shareContent = new ProjectDetailContent();
        if ($shareData) {
            $shareContent->title = $shareData['title'];
        }

        $challengesContent = new ProjectDetailContent();
        if ($challengesData) {
            $challengesContent->badge_text = $challengesData['badge_text'];
            $challengesContent->title = $challengesData['title'];
            $challengesContent->subtitle = $challengesData['subtitle'];
            $challengesContent->challenges_title = $challengesData['challenges_title'];
            $challengesContent->solutions_title = $challengesData['solutions_title'];
        }

        $ctaContent = new ProjectDetailContent();
        if ($ctaData) {
            $ctaContent->title = $ctaData['title'];
            $ctaContent->subtitle = $ctaData['subtitle'];
            $ctaContent->description = $ctaData['description'];
            $ctaContent->button_text = $ctaData['button_text'];
            $ctaContent->button_link = $ctaData['button_link'];
        }

        return view('admin.projects.project-detail-content', compact(
            'heroContent',
            'galleryContent',
            'featuresContent',
            'projectDetailsContent',
            'exploreMoreContent',
            'shareContent',
            'challengesContent',
            'ctaContent'
        ));
    }

    /**
     * Update the project detail page content.
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

            'gallery.title' => 'nullable|string|max:100',
            'gallery.subtitle' => 'nullable|string|max:100',

            'features.title' => 'nullable|string|max:100',
            'features.subtitle' => 'nullable|string|max:100',

            'project_details.title' => 'nullable|string|max:100',
            'project_details.technologies_title' => 'nullable|string|max:100',
            'project_details.category_title' => 'nullable|string|max:100',
            'project_details.client_title' => 'nullable|string|max:100',
            'project_details.date_title' => 'nullable|string|max:100',
            'project_details.status_title' => 'nullable|string|max:100',
            'project_details.links_title' => 'nullable|string|max:100',

            'explore_more.title' => 'nullable|string|max:100',
            'explore_more.subtitle' => 'nullable|string|max:100',
            'explore_more.button_text' => 'nullable|string|max:50',

            'share.title' => 'nullable|string|max:100',

            'challenges.badge_text' => 'nullable|string|max:100',
            'challenges.title' => 'nullable|string|max:100',
            'challenges.subtitle' => 'nullable|string|max:100',
            'challenges.challenges_title' => 'nullable|string|max:100',
            'challenges.solutions_title' => 'nullable|string|max:100',

            'cta.title' => 'nullable|string|max:100',
            'cta.subtitle' => 'nullable|string|max:100',
            'cta.description' => 'nullable|string|max:500',
            'cta.button_text' => 'nullable|string|max:50',
            'cta.button_link' => 'nullable|string|max:255',
        ]);

        // Update hero content
        $this->updateSection('hero', $request->input('hero', []));

        // Update gallery content
        $this->updateSection('gallery', $request->input('gallery', []));

        // Update features content
        $this->updateSection('features', $request->input('features', []));

        // Update project details content
        $this->updateSection('project_details', $request->input('project_details', []));

        // Update explore more content
        $this->updateSection('explore_more', $request->input('explore_more', []));

        // Update share content
        $this->updateSection('share', $request->input('share', []));

        // Update challenges content
        $this->updateSection('challenges', $request->input('challenges', []));

        // Update CTA content
        $this->updateSection('cta', $request->input('cta', []));

        return redirect()->route('admin.project-detail-content')
            ->with('success', 'Project detail page content updated successfully!');
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
        $content = ProjectDetailContent::where('section', $section)->first();

        if (!$content) {
            $content = new ProjectDetailContent();
            $content->section = $section;
        }

        $content->title = $data['title'] ?? null;
        $content->subtitle = $data['subtitle'] ?? null;
        $content->description = $data['description'] ?? null;
        $content->badge_text = $data['badge_text'] ?? null;
        $content->button_text = $data['button_text'] ?? null;
        $content->button_link = $data['button_link'] ?? null;

        // Additional fields for specific sections
        $content->technologies_title = $data['technologies_title'] ?? null;
        $content->category_title = $data['category_title'] ?? null;
        $content->client_title = $data['client_title'] ?? null;
        $content->date_title = $data['date_title'] ?? null;
        $content->status_title = $data['status_title'] ?? null;
        $content->links_title = $data['links_title'] ?? null;
        $content->challenges_title = $data['challenges_title'] ?? null;
        $content->solutions_title = $data['solutions_title'] ?? null;

        $content->is_active = true;

        $content->save();
    }
}
