<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SocialLinkStoreRequest;
use App\Http\Requests\Admin\SocialLinkUpdateRequest;
use App\Models\SocialLink;

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
        SocialLink::create($request->validated());

        return redirect()->route('admin.social.index')->with('success', 'Social link created successfully!');
    }

    public function edit(SocialLink $socialLink)
    {
        return view('admin.social.edit', compact('socialLink'));
    }

    public function update(SocialLinkUpdateRequest $request, SocialLink $socialLink)
    {
        $socialLink->update($request->validated());

        return redirect()->route('admin.social.index')->with('success', 'Social link updated successfully!');
    }

    public function destroy(SocialLink $socialLink)
    {
        $socialLink->delete();
        return redirect()->route('admin.social.index')->with('success', 'Social link deleted successfully!');
    }
}
