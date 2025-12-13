<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category', // e.g., Frontend, Backend, Tools
        'proficiency', // 0-100
        'icon',
        'order',
        'is_active',
    ];

    protected $casts = [
        'proficiency' => 'integer',
        'order' => 'integer',
        'is_active' => 'boolean',
    ];
}
