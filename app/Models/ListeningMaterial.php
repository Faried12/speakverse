<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ListeningMaterial extends Model
{
    use HasFactory;

    protected $fillable = [

        'lesson_id',

        'title',

        'passage',

        // 'script_text',

        'audio_file',

        'instruction',
    ];

    public function questions()
    {
        return $this->hasMany(
            ListeningQuestion::class
        );
    }
}