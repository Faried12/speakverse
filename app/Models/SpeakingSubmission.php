<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpeakingSubmission extends Model
{
    protected $fillable = [
        'user_id',
        'speaking_material_id',
        'audio_file',
        'transcript',
        'details_score',
        'fluency_score',
        'pronunciation_score',
        'vocabulary_score',
        'grammar_score',
        'total_score',
        'feedback',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function material()
    {
        return $this->belongsTo(
            SpeakingMaterial::class,
            'speaking_material_id'
        );
    }
    
}