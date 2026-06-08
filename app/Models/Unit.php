<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Lesson;

class Unit extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'order_number',
        'type',
        'status'
    ];

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}