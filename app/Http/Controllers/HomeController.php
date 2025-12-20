<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Skill;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the home page with projects.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Cache data for better performance with automatic refresh on update
        $projects = \Cache::remember('home.projects', 3600, function () {
            \Cache::put('home.projects_timestamp', time(), 3600);
            return Project::where('is_active', true)
                ->orderBy('order')
                ->with('images')
                ->take(6)
                ->get();
        });

        $services = \Cache::remember('home.services', 3600, function () {
            \Cache::put('home.services_timestamp', time(), 3600);
            return Service::where('is_active', true)
                ->orderBy('order')
                ->get();
        });

        $skills = \Cache::remember('home.skills', 3600, function () {
            \Cache::put('home.skills_timestamp', time(), 3600);
            return Skill::where('is_active', true)
                ->orderBy('order')
                ->take(3)
                ->get();
        });

        $socialLinks = SocialLink::where('is_active', true)
            ->orderBy('order')
            ->get();

        $settings = \Cache::remember('home.settings', 3600, function () {
            \Cache::put('home.settings_timestamp', time(), 3600);
            return Setting::pluck('value', 'key');
        });

        return view('home', compact('projects', 'services', 'skills', 'socialLinks', 'settings'));
    }
}