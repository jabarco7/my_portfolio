<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Certificate extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($certificate) {
            if (empty($certificate->slug)) {
                $baseSlug = \Str::slug($certificate->title);
                $slug = $baseSlug;
                $counter = 1;
                
                // Ensure unique slug
                while (static::where('slug', $slug)->where('id', '!=', $certificate->id ?? 0)->exists()) {
                    $slug = $baseSlug . '-' . $counter;
                    $counter++;
                }
                
                $certificate->slug = $slug;
            }
        });

        static::updating(function ($certificate) {
            if ($certificate->isDirty('title')) {
                $baseSlug = \Str::slug($certificate->title);
                $slug = $baseSlug;
                $counter = 1;
                
                // Ensure unique slug
                while (static::where('slug', $slug)->where('id', '!=', $certificate->id)->exists()) {
                    $slug = $baseSlug . '-' . $counter;
                    $counter++;
                }
                
                $certificate->slug = $slug;
            }
        });
    }

    /**
     * الحقول القابلة للتعبئة
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'description',
        'date',
        'image',
        'certificate_url',
        'is_active',
        'category_id',
        'issuer',
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
