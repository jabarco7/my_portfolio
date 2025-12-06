<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Generate a unique slug for the project.
     *
     * @param string $title
     * @return string
     */
    private function generateUniqueSlug($title)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $counter = 1;

        while (Project::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
    /**
     * Display a listing of the projects.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $projects = Project::orderBy('order')->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new project.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created project in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'description' => 'required|string',
            'client' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'project_url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'order' => 'integer|min:0',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'image_captions.*' => 'nullable|string|max:255',
        ]);

        $project = Project::create([
            'title' => $request->title,
            'slug' => $this->generateUniqueSlug($request->title),
            'excerpt' => $request->excerpt,
            'description' => $request->description,
            'client' => $request->client,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'project_url' => $request->project_url,
            'github_url' => $request->github_url,
            'is_featured' => $request->boolean('is_featured', false),
            'is_active' => $request->boolean('is_active', true),
            'order' => $request->integer('order', 0),
        ]);

        // Handle featured image
        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('projects', 'public');
            $project->update(['featured_image' => $imagePath]);
        }

        // Handle project images
        $images = $request->file('images', []);
        $captions = $request->input('image_captions', []);

        foreach ($images as $index => $image) {
            if ($image) {
                $imagePath = $image->store('projects', 'public');
                $caption = $captions[$index] ?? '';

                ProjectImage::create([
                    'project_id' => $project->id,
                    'image_path' => $imagePath,
                    'caption' => $caption,
                    'is_featured' => $index === 0 && !$project->featured_image,
                    'order' => $index,
                ]);
            }
        }

        return redirect()->route('admin.projects')->with('success', 'Project created successfully!');
    }

    /**
     * Display the specified project.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\View\View
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified project.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\View\View
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified project in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'description' => 'required|string',
            'client' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'project_url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'order' => 'integer|min:0',
        ]);

        $updateData = [
            'excerpt' => $request->excerpt,
            'description' => $request->description,
            'client' => $request->client,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'project_url' => $request->project_url,
            'github_url' => $request->github_url,
            'is_featured' => $request->boolean('is_featured', false),
            'is_active' => $request->boolean('is_active', true),
            'order' => $request->integer('order', 0),
        ];

        // Only update slug if title has changed
        if ($project->title !== $request->title) {
            $updateData['title'] = $request->title;
            $updateData['slug'] = $this->generateUniqueSlug($request->title);
        }

        $project->update($updateData);

        // Handle featured image
        if ($request->hasFile('featured_image')) {
            // Delete old image if exists
            if ($project->featured_image) {
                Storage::disk('public')->delete($project->featured_image);
            }

            $imagePath = $request->file('featured_image')->store('projects', 'public');
            $project->update(['featured_image' => $imagePath]);
        }

        return redirect()->route('admin.projects')->with('success', 'Project updated successfully!');
    }

    /**
     * Remove the specified project from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Project $project)
    {
        // Delete featured image if exists
        if ($project->featured_image) {
            Storage::disk('public')->delete($project->featured_image);
        }

        // Delete project images
        foreach ($project->images as $image) {
            Storage::disk('public')->delete($image->image_path);
            $image->delete();
        }

        $project->delete();

        return redirect()->route('admin.projects')->with('success', 'Project deleted successfully!');
    }

    /**
     * Toggle the featured status of a project.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\RedirectResponse
     */
    public function toggleFeatured(Project $project)
    {
        $project->update(['is_featured' => !$project->is_featured]);

        return redirect()->route('admin.projects')->with('success', 'Project featured status updated!');
    }

    /**
     * Toggle the active status of a project.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\RedirectResponse
     */
    public function toggleActive(Project $project)
    {
        $project->update(['is_active' => !$project->is_active]);

        return redirect()->route('admin.projects')->with('success', 'Project status updated!');
    }

    /**
     * Store new project images.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeImage(Request $request, Project $project)
    {
        $request->validate([
            'images' => 'required|array',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            'captions' => 'nullable|array',
            'captions.*' => 'nullable|string|max:255',
        ]);

        $images = $request->file('images');
        $captions = $request->input('captions', []);
        $currentOrder = $project->images->count();

        foreach ($images as $index => $image) {
            $imagePath = $image->store('projects', 'public');

            ProjectImage::create([
                'project_id' => $project->id,
                'image_path' => $imagePath,
                'caption' => $captions[$index] ?? '',
                'order' => $currentOrder++,
            ]);
        }

        $count = count($images);
        $message = $count === 1 ? 'Image added successfully!' : "{$count} images added successfully!";

        return redirect()->route('admin.projects.edit', $project)->with('success', $message);
    }

    /**
     * Update a project image.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectImage  $image
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateImage(Request $request, ProjectImage $image)
    {
        $request->validate([
            'caption' => 'nullable|string|max:255',
        ]);

        $image->update([
            'caption' => $request->caption,
        ]);

        return redirect()->route('admin.projects.edit', $image->project)->with('success', 'Image updated successfully!');
    }

    /**
     * Set an image as featured.
     *
     * @param  \App\Models\ProjectImage  $image
     * @return \Illuminate\Http\RedirectResponse
     */
    public function featureImage(ProjectImage $image)
    {
        // Remove featured status from all other images of this project
        $image->project->images()->update(['is_featured' => false]);

        // Set this image as featured
        $image->update(['is_featured' => true]);

        return redirect()->route('admin.projects.edit', $image->project)->with('success', 'Image set as featured!');
    }

    /**
     * Remove a project image.
     *
     * @param  \App\Models\ProjectImage  $image
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroyImage(ProjectImage $image)
    {
        $project = $image->project;

        Storage::disk('public')->delete($image->image_path);
        $image->delete();

        return redirect()->route('admin.projects.edit', $project)->with('success', 'Image deleted successfully!');
    }

    /**
     * Return HTML for a new image row.
     *
     * @param  int  $imageId
     * @return \Illuminate\Http\Response
     */
    public function getImageRow($imageId)
    {
        return response(view('admin.projects.partials._image-upload', ['imageId' => $imageId]));
    }
}
