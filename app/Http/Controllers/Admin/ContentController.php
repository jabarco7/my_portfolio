<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContentUpdateRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index()
    {
        $settings = Setting::whereIn('key', [
            'hero_name',
            'hero_title',
            'hero_description',
            'about_title',
            'about_description'
        ])->pluck('value', 'key');

        return view('admin.content.index', compact('settings'));
    }

    /**
     * Show the home page content management form.
     *
     * @return \Illuminate\View\View
     */
    public function home()
    {
        $settings = Setting::whereIn('key', [
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

        return view('admin.content.home', compact('settings'));
    }

    /**
     * Update the home page content.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateHome(Request $request)
    {
        $allowedKeys = [
            'hero_name',
            'hero_title',
            'hero_description',
            'hero_badge_text',
            'hero_cta1_text',
            'hero_cta2_text',
            'hero_tech_stack_title',
            'hero_social_title',
            'hero_social_subtitle'
        ];

        foreach ($allowedKeys as $key) {
            if ($request->has($key)) {
                Setting::set($key, $request->input($key));
            }
        }

        // Clear cache to ensure content is updated immediately
        \Cache::forget('home.settings');
        \Cache::forget('home.socialLinks');
        \Cache::forget('home.skills');
        \Cache::forget('home.services');
        \Cache::forget('home.projects');

        return redirect()->route('admin.content.home')->with('success', 'Home page content updated successfully!');
    }

    public function update(ContentUpdateRequest $request)
    {
        foreach ($request->validated() as $key => $value) {
            Setting::set($key, $value);
        }

        return redirect()->route('admin.content.index')->with('success', 'Content updated successfully!');
    }

    /**
     * Show the about page content management form.
     *
     * @return \Illuminate\View\View
     */
    public function aboutIndex()
    {
        $settings = Setting::whereIn('key', [
            'about_title',
            'about_description',
            'about_image',
            'about_cv_link',
            'about_skills_title',
            'about_experience_title',
            'about_education_title'
        ])->pluck('value', 'key');

        return view('admin.content.about', compact('settings'));
    }

    /**
     * Update the about page content.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function aboutUpdate(Request $request)
    {
        $allowedKeys = [
            'about_title',
            'about_description',
            'about_image',
            'about_cv_link',
            'about_skills_title',
            'about_experience_title',
            'about_education_title'
        ];

        foreach ($allowedKeys as $key) {
            if ($request->has($key)) {
                Setting::set($key, $request->input($key));
            }
        }

        // Clear cache to ensure content is updated immediately
        \Cache::forget('about.settings');

        return redirect()->route('admin.about.index')->with('success', 'About page content updated successfully!');
    }
}
