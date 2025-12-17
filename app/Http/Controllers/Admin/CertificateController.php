<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class CertificateController extends Controller
{
    /**
     * عرض قائمة الشهادات
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certificates = Certificate::latest()->paginate(10);
        return view('admin.certificates.index', compact('certificates'));
    }

    /**
     * عرض نموذج إنشاء شهادة جديدة
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.certificates.create');
    }

    /**
     * حفظ الشهادة الجديدة
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'nullable|boolean',
        ]);

        $data = $request->all();

        // رفع الصورة
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // حفظ الصورة الأصلية
            $path = 'certificates/' . $imageName;
            $image->storeAs('certificates', $imageName, 'public');

            $data['image'] = $path;
        }

        // تعيين القيمة الافتراضية لحقل is_active
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        Certificate::create($data);

        return redirect()->route('admin.certificates.index')
            ->with('success', 'تم إضافة الشهادة بنجاح');
    }

    /**
     * عرض تفاصيل الشهادة
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function show(Certificate $certificate)
    {
        return view('admin.certificates.show', compact('certificate'));
    }

    /**
     * عرض نموذج تعديل الشهادة
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function edit(Certificate $certificate)
    {
        return view('admin.certificates.edit', compact('certificate'));
    }

    /**
     * تحديث الشهادة
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Certificate $certificate)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'nullable|boolean',
        ]);

        $data = $request->all();

        // رفع الصورة الجديدة إذا تم تحديدها
        if ($request->hasFile('image')) {
            // حذف الصورة القديمة
            if ($certificate->image) {
                Storage::disk('public')->delete($certificate->image);
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // حفظ الصورة الأصلية
            $path = 'certificates/' . $imageName;
            $image->storeAs('certificates', $imageName, 'public');

            $data['image'] = $path;
        }

        // تعيين القيمة الافتراضية لحقل is_active
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        $certificate->update($data);

        return redirect()->route('admin.certificates.index')
            ->with('success', 'تم تحديث الشهادة بنجاح');
    }

    /**
     * تبديل حالة الشهادة (نشط/غير نشط)
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\RedirectResponse
     */
    public function toggleActive(Certificate $certificate)
    {
        $certificate->is_active = !$certificate->is_active;
        $certificate->save();
        
        $status = $certificate->is_active ? 'مفعل' : 'معطل';
        
        return redirect()->route('admin.certificates.index')
            ->with('success', "تم {$status} الشهادة بنجاح");
    }
    
    /**
     * حذف الشهادة
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Certificate $certificate)
    {
        // حذف الصورة المرتبطة بالشهادة
        if ($certificate->image) {
            Storage::disk('public')->delete($certificate->image);
        }

        $certificate->delete();

        return redirect()->route('admin.certificates.index')
            ->with('success', 'تم حذف الشهادة بنجاح');
    }
}
