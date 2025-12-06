<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

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

        return view('home', compact('projects'));
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

        return view('projects.index', compact('projects'));
    }
}