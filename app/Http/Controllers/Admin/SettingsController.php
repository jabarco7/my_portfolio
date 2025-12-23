<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class SettingsController extends Controller
{
    /**
     * Display the settings page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Get current contact info from config
        $contactInfo = config('portfolio.contact_info');

        return view('admin.settings.index', compact('contactInfo'));
    }

    /**
     * Update the settings.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'location' => 'required|string|max:255',
            'timezone' => 'required|string|max:50',
            'availability' => 'nullable|string|max:255',
        ]);

        // Update the config file
        $configPath = config_path('portfolio.php');
        $configContent = file_get_contents($configPath);

        // Update contact info in config
        $configContent = preg_replace(
            "/'contact_info' => \[([^\]]+)\]/s",
            "'contact_info' => [
        'email' => '{$request->email}',
        'phone' => '{$request->phone}',
        'location' => '{$request->location}',
        'timezone' => '{$request->timezone}',
        'availability' => '{$request->availability}',
    ]",
            $configContent
        );

        file_put_contents($configPath, $configContent);

        return redirect()->route('admin.settings.index')->with('success', 'Settings updated successfully!');
    }
}
