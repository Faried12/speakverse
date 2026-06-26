<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Unit;
use App\Models\ReadingMaterial;
use App\Models\SpeakingMaterial;
use App\Models\ListeningMaterial;

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
        return $this->hasMany(
            ReadingMaterial::class
        );
    }

    public function speakingMaterials()
    {
        return $this->hasMany(
            SpeakingMaterial::class
        );
    }

    public function writingMaterials()
    {
        return $this->hasMany(
            WritingMaterial::class
        );
    }
    public function listeningMaterials()
    {
        return $this->hasMany(
            ListeningMaterial::class
        );
    }
}