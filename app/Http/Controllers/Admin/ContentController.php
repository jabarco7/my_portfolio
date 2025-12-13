<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContentUpdateRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index()
    {
        $settings = Setting::whereIn('key', [
            'hero_name',
            'hero_title',
            'hero_description',
            'about_title',
            'about_description'
        ])->pluck('value', 'key');

        return view('admin.content.index', compact('settings'));
    }

    public function update(ContentUpdateRequest $request)
    {
        foreach ($request->validated() as $key => $value) {
            Setting::set($key, $value);
        }

        return redirect()->route('admin.content.index')->with('success', 'Content updated successfully!');
    }
}
