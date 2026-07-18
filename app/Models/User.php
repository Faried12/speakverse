<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * Seluruh hasil assessment milik pengguna.
     */
    public function assessmentSubmissions(): HasMany
    {
        return $this->hasMany(AssessmentSubmission::class);
    }

    /**
     * Seluruh hasil Vocabulary Pretest milik pengguna.
     */
    public function vocabularyPretestResults(): HasMany
    {
        return $this->hasMany(VocabularyPretestResult::class);
    }

    /**
     * Seluruh progress lesson milik pengguna.
     */
    public function lessonProgress(): HasMany
    {
        return $this->hasMany(UserLessonProgress::class);
    }
}