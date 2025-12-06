<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the home page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Default profile image path
        $path = 'profile/profile.jpg';

        return view('home', compact('path'));
    }
}