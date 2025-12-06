<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    /**
     * Display the site content management page.
     *
     * @return \Illuminate\View\View
     */
    public function content()
    {
        // Read the home content
        $homeContent = [];

        // About section
        $aboutPath = resource_path('views/home.blade.php');
        if (File::exists($aboutPath)) {
            $aboutContent = File::get($aboutPath);

            // Extract about title and description using regex
            preg_match('/<h2 class="text-3xl md:text-4xl font-bold mb-4 tracking-tight">(.*?)<\/h2>/', $aboutContent, $aboutTitle);
            preg_match('/<p class="mb-4 text-gray-600 dark:text-gray-300 leading-relaxed">(.*?)<\/p>/', $aboutContent, $aboutDesc);

            $homeContent['about_title'] = $aboutTitle[1] ?? 'About Me';
            $homeContent['about_description'] = $aboutDesc[1] ?? 'A professional web developer with a passion for creating beautiful, functional websites.';
        }

        // Services section
        preg_match_all('/<h3 class="text-xl font-semibold mb-3 tracking-tight">(.*?)<\/h3>/', $aboutContent, $serviceTitles);
        preg_match_all('/<p class="text-gray-600 dark:text-gray-300 leading-relaxed">(.*?)<\/p>/', $aboutContent, $serviceDescs);

        $services = [];
        if (isset($serviceTitles[1])) {
            foreach ($serviceTitles[1] as $index => $title) {
                if (isset($serviceDescs[1][$index])) {
                    $services[] = [
                        'title' => $title,
                        'description' => $serviceDescs[1][$index]
                    ];
                }
            }
        }

        // Hero section
        preg_match('/<h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4 tracking-tight">\s*Hi, I\'m <span class="text-primary-300">(.*?)<\/span>\s*<\/h1>/', $aboutContent, $heroName);
        preg_match('/<h2 class="text-2xl md:text-3xl lg:text-4xl font-light mb-6 tracking-wide">\s*(.*?)\s*<\/h2>/', $aboutContent, $heroTitle);
        preg_match('/<p class="text-lg md:text-xl mb-8 max-w-2xl mx-auto leading-relaxed font-light">\s*(.*?)\s*<\/p>/', $aboutContent, $heroDescription);

        $homeContent['hero_name'] = $heroName[1] ?? 'John Doe';
        $homeContent['hero_title'] = $heroTitle[1] ?? 'Professional Web Developer';
        $homeContent['hero_description'] = $heroDescription[1] ?? 'Creating beautiful, functional websites with modern technologies';
        $homeContent['services'] = $services;

        return view('admin.content.index', compact('homeContent'));
    }

    /**
     * Update the site content.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateContent(Request $request)
    {
        $request->validate([
            'hero_name' => 'required|string|max:255',
            'hero_title' => 'required|string|max:255',
            'hero_description' => 'required|string',
            'about_title' => 'required|string|max:255',
            'about_description' => 'required|string',
            'service_title' => 'required|array',
            'service_title.*' => 'required|string|max:255',
            'service_description' => 'required|array',
            'service_description.*' => 'required|string',
        ]);

        // Read the current home.blade.php
        $homePath = resource_path('views/home.blade.php');
        $homeContent = File::get($homePath);

        // Update hero section
        $homeContent = preg_replace(
            '/<h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4 tracking-tight">\s*Hi, I\'m <span class="text-primary-300">(.*?)<\/span>\s*<\/h1>/',
            '<h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4 tracking-tight">\n                Hi, I\'m <span class="text-primary-300">' . $request->hero_name . '</span>\n            </h1>',
            $homeContent
        );

        $homeContent = preg_replace(
            '/<h2 class="text-2xl md:text-3xl lg:text-4xl font-light mb-6 tracking-wide">\s*(.*?)\s*<\/h2>/',
            '<h2 class="text-2xl md:text-3xl lg:text-4xl font-light mb-6 tracking-wide">\n                ' . $request->hero_title . '\n            </h2>',
            $homeContent
        );

        $homeContent = preg_replace(
            '/<p class="text-lg md:text-xl mb-8 max-w-2xl mx-auto leading-relaxed font-light">\s*(.*?)\s*<\/p>/',
            '<p class="text-lg md:text-xl mb-8 max-w-2xl mx-auto leading-relaxed font-light">\n                ' . $request->hero_description . '\n            </p>',
            $homeContent
        );

        // Update about section
        $homeContent = preg_replace(
            '/<h2 class="text-3xl md:text-4xl font-bold mb-4 tracking-tight">(.*?)<\/h2>/',
            '<h2 class="text-3xl md:text-4xl font-bold mb-4 tracking-tight">' . $request->about_title . '</h2>',
            $homeContent
        );

        $homeContent = preg_replace(
            '/<p class="mb-4 text-gray-600 dark:text-gray-300 leading-relaxed">(.*?)<\/p>/',
            '<p class="mb-4 text-gray-600 dark:text-gray-300 leading-relaxed">' . $request->about_description . '</p>',
            $homeContent
        );

        // Update services section
        $servicesHtml = '';
        for ($i = 0; $i < count($request->service_title); $i++) {
            $servicesHtml .= '
            <div class="bg-white dark:bg-gray-900 p-10 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                <div class="text-primary-600 dark:text-primary-400 mb-4">
                    <i class="fas fa-laptop-code text-4xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3 tracking-tight">' . $request->service_title[$i] . '</h3>
                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                    ' . $request->service_description[$i] . '
                </p>
            </div>';
        }

        $homeContent = preg_replace(
            '/<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">.*?<\/div>/s',
            '<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">' . $servicesHtml . '</div>',
            $homeContent
        );

        // Save the updated content
        File::put($homePath, $homeContent);

        return redirect()->route('admin.content')->with('success', 'Content updated successfully!');
    }

    /**
     * Display the contact messages.
     *
     * @return \Illuminate\View\View
     */
    public function messages()
    {
        $messages = ContactMessage::latest()->paginate(10);
        return view('admin.messages.index', compact('messages'));
    }

    /**
     * Show a specific contact message.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function showMessage($id)
    {
        $message = ContactMessage::findOrFail($id);
        return view('admin.messages.show', compact('message'));
    }

    /**
     * Mark a message as read.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function markAsRead($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->markAsRead();
        
        return redirect()->route('admin.messages.show', $id)->with('success', 'Message marked as read!');
    }
    
    /**
     * Reply to a message.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function replyToMessage(Request $request, $id)
    {
        $message = ContactMessage::findOrFail($id);
        
        $request->validate([
            'to' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
        
        // In a real application, you would send an email here
        // For now, we'll just mark the message as read and redirect back
        $message->markAsRead();
        
        return redirect()->route('admin.messages.show', $id)->with('success', 'Reply sent successfully!');
    }
    
    /**
     * Delete a contact message.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteMessage($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->delete();

        return redirect()->route('admin.messages')->with('success', 'Message deleted successfully!');
    }

    /**
     * Display the social links management page.
     *
     * @return \Illuminate\View\View
     */
    public function social()
    {
        // Read the layout content to extract social links
        $layoutPath = resource_path('views/layouts/app.blade.php');
        $layoutContent = File::get($layoutPath);

        // Extract social links
        preg_match_all('/<a href="(.*?)"\s+class=".*?">\s*<i class="fab fa-(.*?) text-xl"><\/i>\s*<\/a>/', $layoutContent, $socialLinks);

        $links = [];
        if (isset($socialLinks[1])) {
            foreach ($socialLinks[1] as $index => $url) {
                $platform = $socialLinks[2][$index] ?? '';
                $links[] = [
                    'platform' => $platform,
                    'url' => $url
                ];
            }
        }

        return view('admin.social.index', compact('links'));
    }

    /**
     * Update the social links.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateSocial(Request $request)
    {
        $request->validate([
            'platform' => 'required|array',
            'platform.*' => 'required|string',
            'url' => 'required|array',
            'url.*' => 'required|url',
        ]);

        // Read the current layout
        $layoutPath = resource_path('views/layouts/app.blade.php');
        $layoutContent = File::get($layoutPath);

        // Generate new social links HTML
        $socialLinksHtml = '';
        for ($i = 0; $i < count($request->platform); $i++) {
            $platform = $request->platform[$i];
            $url = $request->url[$i];

            $socialLinksHtml .= '
                        <a href="' . $url . '"
                            class="text-gray-500 dark:text-white hover:text-primary-600 dark:hover:text-primary-400 transition-colors">
                            <i class="fab fa-' . $platform . ' text-xl"></i>
                        </a>';
        }

        // Replace the social links section
        $layoutContent = preg_replace(
            '/<div class="flex space-x-4">.*?<\/div>/s',
            '<div class="flex space-x-4">' . $socialLinksHtml . '</div>',
            $layoutContent
        );

        // Save the updated layout
        File::put($layoutPath, $layoutContent);

        return redirect()->route('admin.social')->with('success', 'Social links updated successfully!');
    }
}
