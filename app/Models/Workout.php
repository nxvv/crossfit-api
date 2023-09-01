<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Workout extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'mode',
        'equipment',
        'exercises',
        'trainerTips'
    ];

    protected $casts = [
        'equipment' => 'array',
        'exercises' => 'array',
        'trainerTips' => 'array',
    ];

    public function records(): HasMany
    {
        return $this->hasMany(Record::class);
    }
}
