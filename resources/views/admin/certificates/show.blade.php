@extends('admin.layouts.app')

@section('title', 'تفاصيل الشهادة')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">تفاصيل الشهادة: {{ $certificate->title }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.certificates.index') }}" class="btn btn-default btn-sm">
                            <i class="fas fa-arrow-left"></i> العودة للقائمة
                        </a>
                        <a href="{{ route('admin.certificates.edit', $certificate->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> تعديل
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th width="150">المعرف</th>
                                    <td>{{ $certificate->id }}</td>
                                </tr>
                                <tr>
                                    <th>العنوان</th>
                                    <td>{{ $certificate->title }}</td>
                                </tr>

                                <tr>
                                    <th>التاريخ</th>
                                    <td>{{ $certificate->date->format('Y-m-d') }}</td>
                                </tr>
                                <tr>
                                    <th>رابط الشهادة</th>
                                    <td>
                                        @if ($certificate->certificate_url)
                                            <a href="{{ $certificate->certificate_url }}" target="_blank">{{ $certificate->certificate_url }}</a>
                                        @else
                                            <span class="text-muted">لا يوجد رابط</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>الحالة</th>
                                    <td>
                                        @if ($certificate->is_active)
                                            <span class="badge badge-success">نشط</span>
                                        @else
                                            <span class="badge badge-secondary">غير نشط</span>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>الوصف</label>
                                <p>{{ $certificate->description ?: 'لا يوجد وصف' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>صورة الشهادة</label>
                                <div class="text-center">
                                    <img src="{{ $certificate->image_url }}" alt="{{ $certificate->title }}" 
                                         class="img-fluid" style="max-width: 600px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <form action="{{ route('admin.certificates.destroy', $certificate->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد من حذف هذه الشهادة؟')">
                            <i class="fas fa-trash"></i> حذف الشهادة
                        </button>
                    </form>
                    <a href="{{ route('admin.certificates.edit', $certificate->id) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> تعديل
                    </a>
                    <a href="{{ route('admin.certificates.index') }}" class="btn btn-default">
                        <i class="fas fa-arrow-left"></i> العودة للقائمة
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
