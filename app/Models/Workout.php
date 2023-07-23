<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    use HasFactory;

    protected $casts = [
        'equipment' => 'array',
        'exercises' => 'array',
        'trainerTips' => 'array',
    ];
}
