<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the projects.
     */
    public function index()
    {
        $projects = Project::latest()->paginate(9);
        return view('projects.index', compact('projects'));
    }

    /**
     * Display the specified project.
     */
    public function show(Project $project)
    {
        // Default content for sections
        $heroContent = [
            'badge_text' => 'Project Case Study',
            'title' => 'Project Details',
        ];

        $projectDetailsContent = [
            'title' => 'Project Details',
            'technologies_title' => 'Technologies Used',
        ];

        $exploreMoreContent = [
            'title' => 'Explore More Projects',
            'subtitle' => 'Check out other projects in my portfolio',
        ];

        $shareContent = [
            'title' => 'Share Project',
        ];

        // Get social links for sharing
        $socialLinks = [
            (object)[
                'platform' => 'Twitter',
                'url' => 'https://twitter.com/intent/tweet?text=Check out this project: ' . route('projects.show', $project->id),
                'icon' => 'fab fa-twitter'
            ],
            (object)[
                'platform' => 'LinkedIn',
                'url' => 'https://www.linkedin.com/sharing/share-offsite/?url=' . route('projects.show', $project->id),
                'icon' => 'fab fa-linkedin'
            ],
            (object)[
                'platform' => 'Facebook',
                'url' => 'https://www.facebook.com/sharer/sharer.php?u=' . route('projects.show', $project->id),
                'icon' => 'fab fa-facebook'
            ]
        ];

        // Get data from database with fallback to defaults
        
        // Debug: Log the project data
        \Log::info('Project data:', $project->toArray());
        
        $challenges = $project->challenges;
        if (is_string($challenges)) {
            $challenges = json_decode($challenges, true);
        }
        $challenges = $challenges ?: [
            'Complex database design requirements',
            'Performance optimization for large datasets',
            'Real-time data synchronization needs',
            'Cross-browser compatibility requirements'
        ];

        $solutions = $project->solutions;
        if (is_string($solutions)) {
            $solutions = json_decode($solutions, true);
        }
        $solutions = $solutions ?: [
            'Optimized database indexing and query design',
            'Implemented caching strategies for faster performance',
            'Used WebSockets for real-time updates',
            'Comprehensive testing across all major browsers'
        ];

        $results = $project->results;
        if (is_string($results)) {
            $results = json_decode($results, true);
        }
        $results = $results ?: [
            '40% increase in user engagement',
            '60% reduction in page load time',
            '100% uptime since deployment',
            '5-star user satisfaction rating'
        ];
        
        // Debug: Log specific data
        \Log::info('Challenges:', $challenges);
        \Log::info('Solutions:', $solutions);
        \Log::info('Results:', $results);

        return view('projects.show', compact(
            'project',
            'heroContent',
            'projectDetailsContent',
            'exploreMoreContent',
            'shareContent',
            'socialLinks',
            'challenges',
            'solutions',
            'results'
        ));
    }
}
