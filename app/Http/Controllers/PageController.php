<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * Display the home page with projects.
     *
     * @return \Illuminate\View\View
     */
    public function home()
    {
        // Get active projects ordered by order field
        $projects = Project::where('is_active', true)
            ->orderBy('order')
            ->with('images')
            ->get();

        // Generate a navigation token for this session
        $token = Str::random(40);
        session(['navigation_token' => $token]);

        return view('home', compact('projects', 'token'));
    }

    /**
     * Display all projects.
     *
     * @return \Illuminate\View\View
     */
    public function projects(Request $request)
    {
        // Get active projects ordered by order field
        $query = Project::where('is_active', true)
            ->orderBy('order')
            ->with('images');

        // If page parameter is 1 or not set, limit to 6 projects
        // If page parameter is greater than 1, show all projects
        if ($request->get('page', 1) == 1) {
            $projects = $query->take(6)->get();
        } else {
            $projects = $query->get();
        }

        // Get total count of active projects for pagination logic
        $totalActiveProjects = Project::where('is_active', true)->count();

        return view('projects.index', compact('projects', 'totalActiveProjects'));
    }

    /**
     * Display a specific project.
     *
     * @param string $slug
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        // Find project by slug
        $project = Project::where('slug', $slug)
            ->where('is_active', true)
            ->with('images')
            ->firstOrFail();

        return view('projects.show', compact('project'));
    }

    /**
     * Display the about page.
     *
     * @return \Illuminate\View\View
     */
    public function about()
    {
        return view('about');
    }

    /**
     * Display the contact page.
     *
     * @return \Illuminate\View\View
     */
    public function contact()
    {
        return view('contact');
    }

    /**
     * Display the skills page.
     *
     * @return \Illuminate\View\View
     */
    public function skills()
    {
        return view('skills');
    }

    /**
     * Display the certificates page.
     *
     * @return \Illuminate\View\View
     */
    public function certificates()
    {
        return view('certificates');
    }
}
