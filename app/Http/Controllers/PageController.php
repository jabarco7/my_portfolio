<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Skill;
use App\Models\SocialLink;
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
        $projects = Project::where('is_active', true)
            ->orderBy('order')
            ->with('images')
            ->take(6)
            ->get();

        $services = Service::where('is_active', true)
            ->orderBy('order')
            ->get();

        $skills = Skill::where('is_active', true)
            ->orderBy('order')
            ->get();

        $socialLinks = SocialLink::where('is_active', true)
            ->orderBy('order')
            ->get();

        $settings = Setting::pluck('value', 'key');

        return view('home', compact('projects', 'services', 'skills', 'socialLinks', 'settings'));
    }

    /**
     * Display all projects.
     *
     * @return \Illuminate\View\View
     */
    public function projects(Request $request)
    {
        $query = Project::where('is_active', true)
            ->orderBy('order')
            ->with('images');

        $projects = $query->paginate(9);

        return view('projects.index', compact('projects'));
    }

    /**
     * Display a specific project.
     *
     * @param string $slug
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
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
        $settings = Setting::pluck('value', 'key');
        $services = Service::where('is_active', true)->orderBy('order')->get();
        
        return view('about', compact('settings', 'services'));
    }

    /**
     * Display the contact page.
     *
     * @return \Illuminate\View\View
     */
    public function contact()
    {
        $settings = Setting::pluck('value', 'key');
        return view('contact', compact('settings'));
    }

    /**
     * Display the skills page.
     *
     * @return \Illuminate\View\View
     */
    public function skills()
    {
        $skills = Skill::where('is_active', true)->orderBy('order')->get()->groupBy('category');
        return view('skills', compact('skills'));
    }

    /**
     * Display the certificates page.
     *
     * @return \Illuminate\View\View
     */
    public function certificates()
    {
        // Assuming there is a Certificate model, otherwise static view
        // For now, just return view
        return view('certificates');
    }
}
