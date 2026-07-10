<?php

namespace App\Models;

use App\Models\ReadingMaterial;
use Illuminate\Database\Eloquent\Model;

class ReadingQuestion extends Model
{
    protected $fillable = [
        'lesson_id',
        'reading_material_id',
        'category',
        'question',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'option_e',
        'correct_answer',
        'score',
    ];

    public function material()
    {
        return $this->belongsTo(
            ReadingMaterial::class,
            'reading_material_id'
        );
    }

    public function lesson()
    {
        return $this->belongsTo(
            Lesson::class,
            'lesson_id'
        );
    }
}