<?php

namespace App\Models;

use App\Models\Lesson;
use App\Models\ReadingQuestion;
use Illuminate\Database\Eloquent\Model;

class ReadingMaterial extends Model
{
    protected $fillable = [
        'lesson_id',
        'title',
        'passage',
        'instruction',
        'image'
    ];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function questions()
    {
        return $this->hasMany(
            ReadingQuestion::class
        );
    }
}