<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SocialLinkStoreRequest;
use App\Http\Requests\Admin\SocialLinkUpdateRequest;
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
        $socialLink = SocialLink::create($request->validated());

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
    }

    public function edit(SocialLink $socialLink)
    {
        return view('admin.social.edit', compact('socialLink'));
    }

    public function update(SocialLinkUpdateRequest $request, SocialLink $socialLink)
    {
        $socialLink->update($request->validated());

        $this->clearHomeCache();

        return redirect()
            ->route('admin.social.index')
            ->with('success', 'Social link updated successfully.');
    }

    public function destroy(SocialLink $socialLink)
    {
        $socialLink->delete();

        $this->clearHomeCache();

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