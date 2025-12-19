<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'cv_file',
        'cv_link',
        'profile_image',
        'experience_years',
        'projects_count',
        'clients_count',
        'satisfaction_rate',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the CV URL (either from uploaded file or external link)
     */
    public function getCvUrlAttribute()
    {
        if ($this->cv_file) {
            return asset('storage/' . $this->cv_file);
        }

        return $this->cv_link;
    }
}
