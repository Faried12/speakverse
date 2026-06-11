<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpeakingMaterial extends Model
{
    protected $fillable = [
        'lesson_id',
        'title',
        'instruction',
        'passage',
        'image',
    ];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function submissions()
    {
        return $this->hasMany(SpeakingSubmission::class);
    }

    public function questions()
    {
        return $this->hasMany(
            SpeakingQuestion::class,
            'speaking_material_id'
        );
    }
}