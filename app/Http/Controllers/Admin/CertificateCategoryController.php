<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CertificateCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CertificateCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = CertificateCategory::latest()->paginate(10);
        return view('admin.certificate-categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.certificate-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'color' => 'nullable|string|max:7',
            'is_active' => 'nullable|boolean',
        ]);

        $data = $request->all();

        // Generate slug from name if not provided
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        // Set default value for is_active
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        CertificateCategory::create($data);

        return redirect()->route('admin.certificate-categories.index')
            ->with('success', 'تم إضافة التصنيف بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(CertificateCategory $certificateCategory)
    {
        return view('admin.certificate-categories.show', compact('certificateCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CertificateCategory $certificateCategory)
    {
        return view('admin.certificate-categories.edit', compact('certificateCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CertificateCategory $certificateCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'color' => 'nullable|string|max:7',
            'is_active' => 'nullable|boolean',
        ]);

        $data = $request->all();

        // Generate slug from name if not provided
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        // Set default value for is_active
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        $certificateCategory->update($data);

        return redirect()->route('admin.certificate-categories.index')
            ->with('success', 'تم تحديث التصنيف بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CertificateCategory $certificateCategory)
    {
        // Check if category has certificates
        if ($certificateCategory->certificates()->count() > 0) {
            return redirect()->route('admin.certificate-categories.index')
                ->with('error', 'لا يمكن حذف هذا التصنيف لأنه يحتوي على شهادات');
        }

        $certificateCategory->delete();

        return redirect()->route('admin.certificate-categories.index')
            ->with('success', 'تم حذف التصنيف بنجاح');
    }

    /**
     * Toggle active status of the category
     */
    public function toggleActive(CertificateCategory $certificateCategory)
    {
        $certificateCategory->is_active = !$certificateCategory->is_active;
        $certificateCategory->save();

        $status = $certificateCategory->is_active ? 'مفعل' : 'معطل';

        return redirect()->route('admin.certificate-categories.index')
            ->with('success', "تم {$status} التصنيف بنجاح");
    }
}
