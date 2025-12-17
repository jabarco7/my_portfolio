<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'percentage',
        'is_active',
        'order',
    ];

    protected $casts = [
        'percentage' => 'integer',
        'order' => 'integer',
        'is_active' => 'boolean',
    ];
}
