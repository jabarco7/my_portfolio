<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Skill;
use App\Models\SocialLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    /**
     * Display the home page with projects, services, skills, social links, and settings.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // عدد المشاريع والمهارات المراد عرضها (يمكن تغييره بسهولة)
        $projectsCount = 6;
        $skillsCount   = 3;
        $cacheTTL      = 3600; // بالثواني (1 ساعة)

        // المشاريع
        $projects = Cache::remember('home.projects', $cacheTTL, function () use ($projectsCount) {
            return Project::where('is_active', true)
                ->orderBy('order')
                ->with('images')
                ->take($projectsCount)
                ->get();
        });

        // الخدمات
        $services = Cache::remember('home.services', $cacheTTL, function () {
            return Service::where('is_active', true)
                ->orderBy('order')
                ->get();
        });

        // المهارات (أول 3 فقط أو حسب $skillsCount)
        $skills = Cache::remember('home.skills', $cacheTTL, function () use ($skillsCount) {
            return Skill::where('is_active', true)
                ->orderBy('order')
                ->take($skillsCount)
                ->get();
        });

        // روابط التواصل الاجتماعي
        $socialLinks = SocialLink::where('is_active', true)
            ->orderBy('order')
            ->get();

        // الإعدادات (key => value)
        $settings = Cache::remember('home.settings', $cacheTTL, function () {
            return Setting::pluck('value', 'key');
        });

        return view('home', compact('projects', 'services', 'skills', 'socialLinks', 'settings'));
    }
}