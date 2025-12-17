<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactMessage;
use App\Models\AboutPageContent;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Get statistics
        $totalMessages = ContactMessage::count();
        $unreadMessages = ContactMessage::where('is_read', false)->count();
        $recentMessages = ContactMessage::latest()->take(5)->get();
        
        // Get about sections statistics
        $totalAboutSections = AboutPageContent::count();
        $activeAboutSections = AboutPageContent::where('is_active', true)->count();

        return view('admin.dashboard.index', compact(
            'totalMessages',
            'unreadMessages',
            'recentMessages',
            'totalAboutSections',
            'activeAboutSections'
        ));
    }
}
