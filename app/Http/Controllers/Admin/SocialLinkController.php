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
        try {
            $data = $request->validated();
            // Explicitly handle boolean conversion
            $data['is_active'] = $request->boolean('is_active');

            $socialLink = SocialLink::create($data);

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

    public function edit(SocialLink $social)
    {
        return view('admin.social.edit', compact('social'));
    }

    public function update(SocialLinkUpdateRequest $request, SocialLink $social)
    {
        \Log::info('Update SocialLink called', ['id' => $social->id, 'data' => $request->all()]);
        try {
            $data = $request->validated();
            
            if ($request->has('is_active')) {
                 $data['is_active'] = $request->boolean('is_active');
            } else {
                 $data['is_active'] = false;
            }

            \Log::info('Updating SocialLink', ['id' => $social->id, 'data' => $data]);

            $updated = $social->update($data);
            
            \Log::info('Update result', ['updated' => $updated, 'fresh' => $social->fresh()->toArray()]);

            $this->clearHomeCache();

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Social link updated successfully.',
                    'data' => $social->fresh(),
                ]);
            }

            return redirect()
                ->route('admin.social.index')
                ->with('success', 'Social link updated successfully.');
        } catch (\Exception $e) {
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

    public function destroy(SocialLink $social)
    {
        \Log::info('Destroy SocialLink called', ['id' => $social->id]);
        try {
            $social->delete();

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
        } catch (\Exception $e) {
            \Log::error('Error deleting social link: ' . $e->getMessage());
             if (request()->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error deleting social link.',
                ], 500);
            }
            return redirect()->back()->with('error', 'Error deleting social link.');
        }
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
