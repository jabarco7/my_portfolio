<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectFormRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::with(['tags', 'category']);

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

        // Filter by status if provided
        if ($request->has('status') && $request->status !== 'all') {
            if ($request->status === 'active') {
                $query->where('is_active', true);
            } elseif ($request->status === 'inactive') {
                $query->where('is_active', false);
            } elseif ($request->status === 'featured') {
                $query->where('is_featured', true);
            }
        }

        $projects = $query->orderBy('order')->orderBy('created_at', 'desc')->paginate(10);

        // Get filter options
        $categories = \App\Models\Category::orderBy('name')->get();
        $tags = \App\Models\Tag::orderBy('name')->get();

        return view('admin.projects.index', compact('projects', 'categories', 'tags'));
    }

    public function create()
    {
        $tags = Tag::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();
        return view('admin.projects.create', compact('tags', 'categories'));
    }

    public function store(ProjectFormRequest $request)
    {
        $validated = $request->validated();

        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('projects', 'public');
            $validated['featured_image'] = $path;
        }

        $project = Project::create($validated);

        // Attach tags
        if ($request->has('tags')) {
            $project->tags()->attach($request->tags);
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('projects/gallery', 'public');
                $project->images()->create([
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        $tags = Tag::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();
        return view('admin.projects.edit', compact('project', 'tags', 'categories'));
    }

    public function update(ProjectFormRequest $request, Project $project)
    {
        $validated = $request->validated();

        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('featured_image')) {
            if ($project->featured_image) {
                Storage::disk('public')->delete($project->featured_image);
            }
            $path = $request->file('featured_image')->store('projects', 'public');
            $validated['featured_image'] = $path;
        }

        $project->update($validated);

        // Sync tags
        if ($request->has('tags')) {
            $project->tags()->sync($request->tags);
        } else {
            $project->tags()->detach();
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('projects/gallery', 'public');
                $project->images()->create([
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        if ($project->featured_image) {
            Storage::disk('public')->delete($project->featured_image);
        }

        foreach ($project->images as $image) {
            Storage::disk('public')->delete($image->image_path);
            $image->delete();
        }

        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }

    public function toggleFeatured(Project $project)
    {
        $project->update(['is_featured' => !$project->is_featured]);
        return back()->with('success', 'Project featured status updated.');
    }

    public function toggleActive(Project $project)
    {
        $project->update(['is_active' => !$project->is_active]);
        return back()->with('success', 'Project active status updated.');
    }

    public function destroyImage(ProjectImage $image)
    {
        Storage::disk('public')->delete($image->image_path);
        $image->delete();
        return back()->with('success', 'Image deleted successfully.');
    }

    public function storeImage(Request $request, Project $project)
    {
        $request->validate([
            'images' => 'required',
            'images.*' => 'image|max:2048',
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('projects/gallery', 'public');
                $project->images()->create([
                    'image_path' => $path,
                ]);
            }
        }

        return back()->with('success', 'Images added successfully.');
    }

    public function updateImage(Request $request, ProjectImage $image)
    {
        $request->validate([
            'caption' => 'nullable|string|max:255',
        ]);

        $image->update([
            'caption' => $request->caption,
        ]);

        return back()->with('success', 'Image updated successfully.');
    }

    public function featureImage(ProjectImage $image)
    {
        // Set all other images of this project to not featured
        $image->project->images()->update(['is_featured' => false]);

        // Set this image to featured
        $image->update(['is_featured' => true]);

        return back()->with('success', 'Image set as featured.');
    }
}
