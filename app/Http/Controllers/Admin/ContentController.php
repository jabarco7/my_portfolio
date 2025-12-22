<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContentUpdateRequest;
use App\Models\Setting;
use App\Models\AboutPageContent;
use App\Models\AboutPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;

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
        Cache::forget('home.settings');
        Cache::forget('home.socialLinks');
        Cache::forget('home.skills');
        Cache::forget('home.services');
        Cache::forget('home.projects');

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
        $aboutPage = AboutPage::firstOrCreate([], [
            'title' => 'About Me',
            'description' => 'Welcome to my portfolio.',
            'is_active' => true
        ]);

        $settings = Setting::whereIn('key', [
            'about_skills_title',
            'about_experience_title',
            'about_education_title'
        ])->pluck('value', 'key');

        return view('admin.content.about', compact('aboutPage', 'settings'));
    }


    /**
     * Update the about page content.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function aboutUpdate(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'required|string',
            'cv_file' => 'nullable|file|mimes:pdf|max:10240',
            'profile_image' => 'nullable|image|max:5120',
            'experience_years' => 'nullable|integer|min:0',
            'projects_count' => 'nullable|integer|min:0',
            'clients_count' => 'nullable|integer|min:0',
            'satisfaction_rate' => 'nullable|integer|min:0|max:100',
            'about_skills_title' => 'nullable|string|max:255',
            'about_experience_title' => 'nullable|string|max:255',
            'about_education_title' => 'nullable|string|max:255',
        ]);

        $aboutPage = AboutPage::firstOrCreate([]);
        
        $data = $request->only([
            'title', 
            'subtitle',
            'description', 
            'experience_years', 
            'projects_count', 
            'clients_count', 
            'satisfaction_rate'
        ]);

        // Handle CV Upload
        if ($request->hasFile('cv_file')) {
            if ($aboutPage->cv_file) {
                Storage::disk('public')->delete($aboutPage->cv_file);
            }
            $data['cv_file'] = $request->file('cv_file')->store('cv', 'public');
        }

        // Handle Profile Image Upload
        if ($request->hasFile('profile_image')) {
            if ($aboutPage->profile_image) {
                Storage::disk('public')->delete($aboutPage->profile_image);
            }
            $data['profile_image'] = $request->file('profile_image')->store('about-images', 'public');
        }

        $aboutPage->update($data);

        $allowedKeys = [
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
        Cache::forget('about.settings');
        Cache::forget('about.page');

        return redirect()->route('admin.about.index')->with('success', 'About page content updated successfully!');
    }

    /**
     * Show the about page content management index.
     *
     * @return \Illuminate\View\View
     */
    public function aboutPageContentIndex()
    {
        $aboutContents = AboutPageContent::orderBy('order')->paginate(10);
        return view('admin.about.index', compact('aboutContents'));
    }

    /**
     * Show the form for creating a new about page content.
     *
     * @return \Illuminate\View\View
     */
    public function aboutPageContentCreate()
    {
        return view('admin.about.create');
    }

    /**
     * Store a newly created about page content in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function aboutPageContentStore(Request $request)
    {
        $request->validate([
            'badge_text' => 'nullable|string|max:255',
            'heading_line1' => 'nullable|string|max:255',
            'heading_line2' => 'nullable|string|max:255',
            'name' => 'nullable|string|max:255',
            'experience_years' => 'nullable|integer|min:0',
            'projects_count' => 'nullable|integer|min:0',
            'clients_count' => 'nullable|integer|min:0',
            'satisfaction_rate' => 'nullable|integer|min:0|max:100',
            'description' => 'nullable|string',
            'skills_title' => 'nullable|string|max:255',
            'cv_file' => 'nullable|file|mimes:pdf|max:10240',
            'image' => 'nullable|file|mimes:jpeg,jpg,png,gif|max:5120',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
            'timeline' => 'nullable|json'
        ]);

        $data = $request->all();

        // Handle CV file upload
        if ($request->hasFile('cv_file')) {
            $cvFile = $request->file('cv_file');
            $cvFileName = time() . '_' . $cvFile->getClientOriginalName();
            $cvFilePath = $cvFile->storeAs('cv', $cvFileName, 'public');
            $data['cv_file_path'] = $cvFilePath;
            $data['cv_file_name'] = $cvFile->getClientOriginalName();
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('about-images', $imageName, 'public');
            $data['image'] = $imagePath;
        }

        // Parse timeline JSON if provided
        if ($request->has('timeline') && !empty($request->timeline)) {
            $data['timeline'] = json_decode($request->timeline, true);
        }

        $data['is_active'] = $request->boolean('is_active', true);
        $data['order'] = $request->integer('order', 0);

        AboutPageContent::create($data);

        return redirect()->route('admin.about-page-content.index')->with('success', 'About page content created successfully!');
    }

    /**
     * Show the form for editing the specified about page content.
     *
     * @param  \App\Models\AboutPageContent  $aboutPageContent
     * @return \Illuminate\View\View
     */
    public function aboutPageContentEdit(AboutPageContent $aboutPageContent)
    {
        return view('admin.about.edit', compact('aboutPageContent'));
    }

    /**
     * Update the specified about page content in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AboutPageContent  $aboutPageContent
     * @return \Illuminate\Http\RedirectResponse
     */
    public function aboutPageContentUpdate(Request $request, AboutPageContent $aboutPageContent)
    {
        $request->validate([
            'badge_text' => 'nullable|string|max:255',
            'heading_line1' => 'nullable|string|max:255',
            'heading_line2' => 'nullable|string|max:255',
            'name' => 'nullable|string|max:255',
            'experience_years' => 'nullable|integer|min:0',
            'projects_count' => 'nullable|integer|min:0',
            'clients_count' => 'nullable|integer|min:0',
            'satisfaction_rate' => 'nullable|integer|min:0|max:100',
            'description' => 'nullable|string',
            'skills_title' => 'nullable|string|max:255',
            'cv_file' => 'nullable|file|mimes:pdf|max:10240',
            'image' => 'nullable|file|mimes:jpeg,jpg,png,gif|max:5120',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
            'timeline' => 'nullable|json'
        ]);

        $data = $request->all();

        // Handle CV file upload
        if ($request->hasFile('cv_file')) {
            // Delete old file if exists
            if ($aboutPageContent->cv_file_path) {
                Storage::disk('public')->delete($aboutPageContent->cv_file_path);
            }

            $cvFile = $request->file('cv_file');
            $cvFileName = time() . '_' . $cvFile->getClientOriginalName();
            $cvFilePath = $cvFile->storeAs('cv', $cvFileName, 'public');
            $data['cv_file_path'] = $cvFilePath;
            $data['cv_file_name'] = $cvFile->getClientOriginalName();
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($aboutPageContent->image) {
                Storage::disk('public')->delete($aboutPageContent->image);
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('about-images', $imageName, 'public');
            $data['image'] = $imagePath;
        }

        // Parse timeline JSON if provided
        if ($request->has('timeline') && !empty($request->timeline)) {
            $data['timeline'] = json_decode($request->timeline, true);
        }

        $data['is_active'] = $request->boolean('is_active');
        $data['order'] = $request->integer('order');

        $aboutPageContent->update($data);

        return redirect()->route('admin.about-page-content.index')->with('success', 'About page content updated successfully!');
    }

    /**
     * Remove the specified about page content from storage.
     *
     * @param  \App\Models\AboutPageContent  $aboutPageContent
     * @return \Illuminate\Http\RedirectResponse
     */
    public function aboutPageContentDestroy(AboutPageContent $aboutPageContent)
    {
        // Delete files if they exist
        if ($aboutPageContent->cv_file_path) {
            Storage::disk('public')->delete($aboutPageContent->cv_file_path);
        }

        if ($aboutPageContent->image) {
            Storage::disk('public')->delete($aboutPageContent->image);
        }

        $aboutPageContent->delete();

        return redirect()->route('admin.about-page-content.index')->with('success', 'About page content deleted successfully!');
    }

    /**
     * Toggle the active status of the specified about page content.
     *
     * @param  \App\Models\AboutPageContent  $aboutPageContent
     * @return \Illuminate\Http\JsonResponse
     */
    public function aboutPageContentToggleActive(AboutPageContent $aboutPageContent)
    {
        $aboutPageContent->update(['is_active' => !$aboutPageContent->is_active]);

        return response()->json([
            'success' => true,
            'message' => 'About page content status updated successfully!'
        ]);
    }
}