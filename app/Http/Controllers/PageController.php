<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Certificate;
use App\Models\CertificateCategory;
use App\Models\ProjectPageContent;
use App\Models\ProjectDetailContent;
use App\Models\Skill;
use App\Models\SkillsPageContent;
use App\Models\SocialLink;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;

class PageController extends Controller
{
    /**
     * Display the home page.
     *
     * @return \Illuminate\View\View
     */
    public function home()
    {
        // Get home page settings from the database
        $settings = Cache::remember('home.settings', 3600, function () {
            return \App\Models\Setting::whereIn('key', [
                'hero_name',
                'hero_title',
                'hero_description',
                'hero_badge_text',
                'hero_cta1_text',
                'hero_cta2_text',
                'hero_tech_stack_title',
                'hero_social_title',
                'hero_social_subtitle'
            ])->pluck('value', 'key');
        });

        // Get featured projects for the home page
        $featuredProjects = Cache::remember('home.projects.featured', 3600, function () {
            return Project::where('is_active', true)
                ->where('is_featured', true)
                ->orderBy('order')
                ->take(6)
                ->with(['images', 'tags', 'category'])
                ->get();
        });

        // Get recent projects for the home page
        $recentProjects = Cache::remember('home.projects.recent', 3600, function () {
            return Project::where('is_active', true)
                ->orderBy('created_at', 'desc')
                ->take(3)
                ->with(['images', 'tags', 'category'])
                ->get();
        });

        // Get project statistics
        $stats = Cache::remember('home.stats', 3600, function () {
            return [
                'total' => Project::where('is_active', true)->count(),
                'featured' => Project::where('is_active', true)->where('is_featured', true)->count(),
                'recent' => Project::where('is_active', true)
                    ->where('created_at', '>=', now()->subMonths(6))
                    ->count(),
            ];
        });

        // Get skills for the home page
        $skills = Cache::remember('home.skills.limited.3', 3600, function () {
        return Skill::where('is_active', true)
        ->orderBy('order')
        ->take(3)
        ->get();
});


        // Get social links for the home page
        $socialLinks = Cache::remember('home.socialLinks', 3600, function () {
            return SocialLink::where('is_active', true)
                ->orderBy('order')
                ->get();
        });

        return view('home', compact('featuredProjects', 'recentProjects', 'stats', 'skills', 'socialLinks', 'settings'));
    }

    /**
     * Display the projects page.
     *
     * @return \Illuminate\View\View
     */
    public function projects(Request $request)
    {
        // Base query with active projects
        $query = Project::where('is_active', true)
            ->orderBy('order')
            ->with(['images', 'tags', 'category']);

        // Filter by category if provided
        if ($request->has('category') && $request->category !== 'all') {
            $query->where('category_id', $request->category);
        }

        // Filter by tag if provided
        if ($request->has('tag') && $request->tag !== 'all') {
            $query->whereHas('tags', function ($q) use ($request) {
                $q->where('tags.id', $request->tag);
            });
        }

        // Get paginated results
        $projects = $query->paginate(9);

        // Get total count of active projects
        $totalActiveProjects = Project::where('is_active', true)->count();


        // Get only categories that have active projects for filter dropdown
        $categories = \App\Models\Category::whereHas('projects', function ($query) {
            $query->where('is_active', true);
        })->orderBy('name')->get();

        // Get only tags that are used by active projects for filter dropdown
        $tags = \App\Models\Tag::whereHas('projects', function ($query) {
            $query->where('is_active', true);
        })->orderBy('name')->get();

        // Get dynamic content for project page sections
        $pageContent = Cache::remember('project_page_content', 3600, function () {
            return [
                'hero_stats' => ProjectPageContent::getHeroStats(),
                'filter_buttons' => ProjectPageContent::getFilterButtons(),
                'project_types' => ProjectPageContent::getProjectTypes(),
                'process_steps' => ProjectPageContent::getProcessSteps(),
                'cta_section' => ProjectPageContent::getCtaSection(),
            ];
        });

        return view('projects.index', compact('projects', 'totalActiveProjects', 'categories', 'tags', 'pageContent'));
    }

    /**
     * Display the about page.
     *
     * @return \Illuminate\View\View
     */
    public function about()
    {
        // الحصول على بيانات صفحة About من قاعدة البيانات
        $aboutPage = \App\Models\AboutPage::where('is_active', true)->first();

        // If no about page exists, create a default object to prevent errors
        if (!$aboutPage) {
            $aboutPage = new \App\Models\AboutPage();
            $aboutPage->profile_image = null;
            $aboutPage->title = 'About Me';
            $aboutPage->subtitle = 'Professional Profile';
            $aboutPage->description = 'Welcome to my portfolio website.';
            $aboutPage->cv_file = null;
            $aboutPage->cv_link = '#';
            $aboutPage->experience_years = 0;
            $aboutPage->projects_count = 0;
            $aboutPage->clients_count = 0;
            $aboutPage->satisfaction_rate = 0;
        }

        $socialLinks = Cache::remember('home.socialLinks', 3600, function () {
            return SocialLink::where('is_active', true)
                ->orderBy('order')
                ->get();
        });
        return view('about', compact('aboutPage','socialLinks'));
    }

    /**
     * Display the skills page.
     *
     * @return \Illuminate\View\View
     */
    public function skills()
    {
        // Get all active skills
        $skills = Skill::where('is_active', true)
            ->orderBy('order')
            ->get();
            
        // Get skills page content
        $heroContent = SkillsPageContent::getHeroSection();
        $skillsListContent = SkillsPageContent::getSkillsListSection();
        $methodologiesContent = SkillsPageContent::getMethodologiesSection();
        $ctaContent = SkillsPageContent::getCtaSection();
        $statsData = SkillsPageContent::getStatsSection();

        return view('skills', compact('skills', 'heroContent', 'skillsListContent', 'methodologiesContent', 'ctaContent', 'statsData'));
    }

    /**
     * Display the certificates page.
     *
     * @return \Illuminate\View\View
     */
    public function certificates(Request $request)
    {
        // Get all active certificates with their categories
        $query = Certificate::where('is_active', true)
            ->with('category')
            ->orderBy('date', 'desc');

        // Filter by category if provided
        if ($request->has('category') && $request->category !== 'all') {
            $category = CertificateCategory::where('slug', $request->category)->first();
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        // Get total count for pagination
        $totalCertificates = $query->count();
        
        // Get only first 10 certificates initially
        $certificates = $query->take(10)->get();
        
        // Check if there are more certificates to load
        $hasMore = $totalCertificates > 10;

        // Get all certificate categories for filter
        $categories = CertificateCategory::where('is_active', true)
            ->orderBy('name')
            ->get();

        // Get certificate statistics
        $stats = [
            'total' => Certificate::where('is_active', true)->count(),
            'categories' => $categories->count(),
        ];



        return view('certificates_unified', compact('certificates', 'categories', 'stats', 'hasMore', 'totalCertificates'));
    }


    /**
     * Load more certificates via AJAX.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function loadMoreCertificates(Request $request)
    {
        $offset = $request->input('offset', 10);
        $category = $request->input('category', 'all');
        
        // Get all active certificates with their categories
        $query = Certificate::where('is_active', true)
            ->with('category')
            ->orderBy('date', 'desc');

        // Filter by category if provided
        if ($category !== 'all') {
            $categoryObj = CertificateCategory::where('slug', $category)->first();
            if ($categoryObj) {
                $query->where('category_id', $categoryObj->id);
            }
        }
        
        // Get the next 10 certificates
        $certificates = $query->skip($offset)->take(10)->get();
        
        // Check if there are more certificates to load
        $hasMore = ($offset + 10) < $query->count();
        
        return response()->json([
            'certificates' => $certificates,
            'hasMore' => $hasMore,
            'nextOffset' => $offset + 10
        ]);
    }
    
    /**
     * Display a certificate detail page.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function certificate($id)
    {
        // Find certificate by ID
        $certificate = Certificate::where('id', $id)
            ->where('is_active', true)
            ->with('category')
            ->firstOrFail();

        // Get related certificates (same category)
        $relatedCertificates = Certificate::where('id', '!=', $certificate->id)
            ->where('is_active', true)
            ->where('category_id', $certificate->category_id)
            ->inRandomOrder()
            ->take(3)
            ->get();



        return view('certificate_details_unified', compact('certificate', 'relatedCertificates'));
    }

    /**
     * Display the contact page.
     *
     * @return \Illuminate\View\View
     */
    public function contact()
    {
        // Get social links for the contact page
        
         $socialLinks = Cache::remember('home.socialLinks', 3600, function () {
            return SocialLink::where('is_active', true)
                ->orderBy('order')
                ->get();
        });

        return view('contact', compact('socialLinks'));
    }
    /**
     * Display a listing of the projects.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Base query with active projects
        $query = Project::where('is_active', true)
            ->orderBy('order')
            ->with(['images', 'tags', 'category']);

        // Filter by category if provided
        if ($request->has('category') && $request->category !== 'all') {
            $query->where('category_id', $request->category);
        }

        // Filter by tag if provided
        if ($request->has('tag') && $request->tag !== 'all') {
            $query->whereHas('tags', function ($q) use ($request) {
                $q->where('tags.id', $request->tag);
            });
        }

        // Get paginated results
        $projects = $query->paginate(9);

        // Get total count of active projects
        $totalActiveProjects = Project::where('is_active', true)->count();


        // Get only categories that have active projects for filter dropdown
        $categories = \App\Models\Category::whereHas('projects', function ($query) {
            $query->where('is_active', true);
        })->orderBy('name')->get();

        // Get only tags that are used by active projects for filter dropdown
        $tags = \App\Models\Tag::whereHas('projects', function ($query) {
            $query->where('is_active', true);
        })->orderBy('name')->get();

        // Get project statistics
        $stats = [
            'total' => $totalActiveProjects,
            'featured' => Project::where('is_active', true)->where('is_featured', true)->count(),
            'recent' => Project::where('is_active', true)
                ->where('created_at', '>=', now()->subMonths(6))
                ->count(),
        ];

        // Get dynamic content for project page sections
        $pageContent = Cache::remember('project_page_content', 3600, function () {
            return [
                'hero_stats' => ProjectPageContent::getHeroStats(),
                'filter_buttons' => ProjectPageContent::getFilterButtons(),
                'project_types' => ProjectPageContent::getProjectTypes(),
                'process_steps' => ProjectPageContent::getProcessSteps(),
                'cta_section' => ProjectPageContent::getCtaSection(),
            ];
        });

        return view('projects.index', compact('projects', 'totalActiveProjects', 'categories', 'tags', 'stats', 'pageContent'));
    }

    /**
     * Display the specified project.
     *
     * @param string $slug
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        // Get the project with its images and category
        $project = Project::where('slug', $slug)
            ->where('is_active', true)
            ->with(['images', 'category'])
            ->firstOrFail();

        // Get related projects (same category or featured)
        $relatedProjects = Project::where('id', '!=', $project->id)
            ->where('is_active', true)
            ->where(function ($query) use ($project) {
                $query->where('category_id', $project->category_id)
                    ->orWhere('is_featured', true);
            })
            ->inRandomOrder()
            ->take(3)
            ->get();

        // Increment view count - commented out as views column doesn't exist
        // $project->increment('views');
        
        // Get social links
        $socialLinks = Cache::remember('home.socialLinks', 3600, function () {
            return SocialLink::where('is_active', true)
                ->orderBy('order')
                ->get();
        });
        
        // Get project detail page content
        $heroContent = ProjectDetailContent::getHeroSection();
        $galleryContent = ProjectDetailContent::getGallerySection();
        $featuresContent = ProjectDetailContent::getFeaturesSection();
        $projectDetailsContent = ProjectDetailContent::getProjectDetailsSection();
        $exploreMoreContent = ProjectDetailContent::getExploreMoreSection();
        $shareContent = ProjectDetailContent::getShareSection();
        $challengesContent = ProjectDetailContent::getChallengesSection();
        $ctaContent = ProjectDetailContent::getCtaSection();

        // Prepare challenges, solutions, and results from project data
        $challenges = $project->challenges;
        if (is_string($challenges)) {
            $challenges = json_decode($challenges, true);
        }
        if (is_array($challenges)) {
            $challenges = array_filter($challenges, function($value) {
                return !empty(trim($value));
            });
        }
        
        $solutions = $project->solutions;
        if (is_string($solutions)) {
            $solutions = json_decode($solutions, true);
        }
        if (is_array($solutions)) {
            $solutions = array_filter($solutions, function($value) {
                return !empty(trim($value));
            });
        }
        
        $results = $project->results;
        if (is_string($results)) {
            $results = json_decode($results, true);
        }
        if (is_array($results)) {
            $results = array_filter($results, function($value) {
                return !empty(trim($value));
            });
        }

        return view('projects.show', compact('project', 'relatedProjects', 'socialLinks', 'heroContent', 'galleryContent', 'featuresContent', 'projectDetailsContent', 'exploreMoreContent', 'shareContent', 'challengesContent', 'ctaContent', 'challenges', 'solutions', 'results'));
    }

    /**
     * Get project data for AJAX requests.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProjectData($id)
    {
        $project = Project::where('id', $id)
            ->where('is_active', true)
            ->with('images')
            ->firstOrFail();

        return response()->json([
            'id' => $project->id,
            'title' => $project->title,
            'slug' => $project->slug,
            'excerpt' => $project->excerpt,
            'description' => $project->description,
            'featured_image' => $project->featured_image ? asset('storage/' . $project->featured_image) : null,
            'project_url' => $project->project_url,
            'github_url' => $project->github_url,
            'client' => $project->client,
            'category' => $project->category,
            'is_featured' => $project->is_featured,
            'views' => $project->views,
            'images' => $project->images->map(function ($image) {
                return [
                    'id' => $image->id,
                    'caption' => $image->caption,
                    'is_featured' => $image->is_featured,
                    'image' => asset('storage/' . $image->image),
                ];
            }),
        ]);
    }
}