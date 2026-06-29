<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssessmentAnswer extends Model
{
    protected $fillable = [
        'assessment_submission_id',
        'question_type',
        'question_id',
        'answer',
        'selected_option',
        'is_correct',
        'score',
        'max_score',
        'feedback',
    ];

    public function submission()
    {
        return $this->belongsTo(AssessmentSubmission::class);
    }
}