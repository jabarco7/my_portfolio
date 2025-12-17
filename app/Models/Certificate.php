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
        'is_active',
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
     * الحصول على الشهادات النشطة فقط
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
