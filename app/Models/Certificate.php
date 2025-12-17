<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    /**
     * الحقول القابلة للتعبئة
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'date',
        'image',
        'certificate_url',
        'is_active',
        'category_id',
    ];

    /**
     * تحويل الحقول إلى أنواع بيانات محددة
     *
     * @var array
     */
    protected $casts = [
        'date' => 'date',
        'is_active' => 'boolean',
    ];

    /**
     * الحصول على رابط الصورة
     *
     * @return string
     */
    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return asset('images/default-certificate.jpg');
        }

        return asset('storage/' . $this->image);
    }

    /**
     * Get the certificate URL attribute
     *
     * @return string|null
     */
    public function getCertificateUrlAttribute()
    {
        return $this->certificate_url ?? null;
    }

    /**
     * Get the issued at attribute as a date
     *
     * @return \Carbon\Carbon
     */
    public function getIssuedAtAttribute()
    {
        return $this->date;
    }

    /**
     * الحصول على الشهادات النشطة فقط
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * الحصول على التصنيف الخاص بالشهادة
     */
    public function category()
    {
        return $this->belongsTo(CertificateCategory::class);
    }
}
