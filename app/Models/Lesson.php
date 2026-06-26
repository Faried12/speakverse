<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Unit;
use App\Models\ReadingMaterial;
use App\Models\SpeakingMaterial;
use App\Models\ListeningMaterial;
use App\Models\WritingMaterial;
use App\Models\ReadingQuestion;
use App\Models\ListeningQuestion;
use App\Models\WritingQuestion;
use App\Models\SpeakingQuestion;

class Lesson extends Model
{
    protected $fillable = [
        'unit_id',
        'skill_type',
        'title',
        'description',
        'order_number',
        'status'
    ];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function readingMaterial()
    {
        return $this->hasMany(ReadingMaterial::class);
    }

    public function speakingMaterials()
    {
        return $this->hasMany(SpeakingMaterial::class);
    }

    public function writingMaterials()
    {
        return $this->hasMany(WritingMaterial::class);
    }

    public function listeningMaterials()
    {
        return $this->hasMany(ListeningMaterial::class);
    }

    public function readingQuestions()
    {
        return $this->hasMany(ReadingQuestion::class, 'lesson_id')
            ->whereNull('reading_material_id');
    }

    public function listeningQuestions()
    {
        return $this->hasMany(ListeningQuestion::class, 'lesson_id')
            ->whereNull('listening_material_id');
    }

    public function writingQuestions()
    {
        return $this->hasMany(WritingQuestion::class, 'lesson_id')
            ->whereNull('writing_material_id');
    }

    public function speakingQuestions()
    {
        return $this->hasMany(SpeakingQuestion::class, 'lesson_id')
            ->whereNull('speaking_material_id');
    }
}