<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SocialLinkStoreRequest;
use App\Http\Requests\SocialLinkUpdateRequest;
use App\Models\SocialLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class SocialLinkController extends Controller
{
    public function index()
    {
        $socialLinks = SocialLink::orderBy('order')->get();
        return view('admin.social.index', compact('socialLinks'));
    }

    public function create()
    {
        return view('admin.social.create');
    }

    public function store(SocialLinkStoreRequest $request)
    {
        // Log the incoming request data for debugging
        \Log::info('SocialLink store request data:', $request->all());

        // Convert is_active from string to boolean if needed
        $requestData = $request->validated();
        \Log::info('Validated request data:', $requestData);

        if (isset($requestData['is_active'])) {
            $originalValue = $requestData['is_active'];
            $requestData['is_active'] = filter_var($requestData['is_active'], FILTER_VALIDATE_BOOLEAN);
            \Log::info("Converted is_active from '{$originalValue}' to " . ($requestData['is_active'] ? 'true' : 'false'));
        } else {
            // Set default value if not provided
            $requestData['is_active'] = true;
            \Log::info('is_active not provided, setting to true');
        }

        try {
            $socialLink = SocialLink::create($requestData);

            // Log the created social link for debugging
            \Log::info('Created social link:', $socialLink->toArray());

            $this->clearHomeCache();

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Social link created successfully.',
                    'data' => $socialLink,
                ]);
            }

            return redirect()
                ->route('admin.social.index')
                ->with('success', 'Social link created successfully.');
        } catch (\Exception $e) {
            // Log any errors for debugging
            \Log::error('Error creating social link: ' . $e->getMessage());

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error creating social link: ' . $e->getMessage(),
                ], 500);
            }

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Error creating social link: ' . $e->getMessage());
        }
    }

    public function edit(SocialLink $socialLink)
    {
        return view('admin.social.edit', compact('socialLink'));
    }

    public function update(SocialLinkUpdateRequest $request, SocialLink $socialLink)
    {
        // Log the incoming request data for debugging
        \Log::info('SocialLink update request data:', $request->all());

        // Convert is_active from string to boolean if needed
        $requestData = $request->validated();
        \Log::info('Validated request data:', $requestData);

        if (isset($requestData['is_active'])) {
            $originalValue = $requestData['is_active'];
            $requestData['is_active'] = filter_var($requestData['is_active'], FILTER_VALIDATE_BOOLEAN);
            \Log::info("Converted is_active from '{$originalValue}' to " . ($requestData['is_active'] ? 'true' : 'false'));
        } else {
            // Set default value if not provided
            $requestData['is_active'] = true;
            \Log::info('is_active not provided, setting to true');
        }

        try {
            $socialLink->update($requestData);

            // Log the updated social link for debugging
            \Log::info('Updated social link:', $socialLink->toArray());

            $this->clearHomeCache();

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Social link updated successfully.',
                    'data' => $socialLink,
                ]);
            }

            return redirect()
                ->route('admin.social.index')
                ->with('success', 'Social link updated successfully.');
        } catch (\Exception $e) {
            // Log any errors for debugging
            \Log::error('Error updating social link: ' . $e->getMessage());

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error updating social link: ' . $e->getMessage(),
                ], 500);
            }

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Error updating social link: ' . $e->getMessage());
        }
    }

    public function destroy(SocialLink $socialLink)
    {
        $socialLink->delete();

        $this->clearHomeCache();

        if (request()->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Social link deleted successfully.',
            ]);
        }

        return redirect()
            ->route('admin.social.index')
            ->with('success', 'Social link deleted successfully.');
    }

    public function bulkUpdate(Request $request)
    {
        $request->validate([
            'platform.*' => 'required|string',
            'url.*'      => 'required|url',
        ]);

        DB::transaction(function () use ($request) {
            SocialLink::query()->delete();

            $platforms = $request->input('platform', []);
            $urls      = $request->input('url', []);

            foreach ($platforms as $index => $platform) {
                if (!empty($urls[$index])) {
                    SocialLink::create([
                        'platform'  => $platform,
                        'url'       => $urls[$index],
                        'icon'      => $this->getIconForPlatform($platform),
                        'order'     => $index + 1,
                        'is_active' => true,
                    ]);
                }
            }
        });

        $this->clearHomeCache();

        return redirect()
            ->route('admin.social.index')
            ->with('success', 'Social links updated successfully.');
    }

    private function clearHomeCache(): void
    {
        Cache::forget('home.socialLinks');
        Cache::forget('home.socialLinks_timestamp');
    }

    private function getIconForPlatform(string $platform): string
    {
        $icons = [
            'twitter'   => 'ri-twitter-fill',
            'facebook'  => 'ri-facebook-fill',
            'instagram' => 'ri-instagram-fill',
            'linkedin'  => 'ri-linkedin-box-fill',
            'github'    => 'ri-github-fill',
            'youtube'   => 'ri-youtube-fill',
            'dribbble'  => 'ri-dribbble-fill',
            'behance'   => 'ri-behance-fill',
            'website'   => 'ri-global-line',
            'email'     => 'ri-mail-fill'
        ];

        return $icons[$platform] ?? 'ri-link-fill';
    }
}