<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;


class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::orderBy('order')->orderBy('name')->paginate(10);
        return view('admin.skills.index', compact('skills'));
    }

    public function create()
    {
        return view('admin.skills.create');
    }

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'category' => 'nullable|string|max:255',
        'percentage' => 'required|integer|min:0|max:100',
        'order' => 'integer|min:0',
        'icon' => 'nullable|string|max:255',
    ]);

    $data = $request->all();

    // اجعل المهارة مفعلة إذا تم اختيارها، وإلا لا
    $data['is_active'] = $request->has('is_active') ? 1 : 0;

    Skill::create($data);

    // مسح التخزين المؤقت للمهارات
    Cache::forget('home.skills');

    return redirect()->route('admin.skills.index')
        ->with('success', 'Skill created successfully.');
}

    public function edit(Skill $skill)
    {
        return view('admin.skills.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'percentage' => 'required|integer|min:0|max:100',
            'order' => 'integer|min:0',
            'icon' => 'nullable|string|max:255',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        $skill->update($data);

        // مسح التخزين المؤقت للمهارات
        Cache::forget('home.skills');

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill updated successfully.');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();

        // مسح التخزين المؤقت للمهارات
        Cache::forget('home.skills');

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill deleted successfully.');
    }
}