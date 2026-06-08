<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Unit;

class LearningContentController extends Controller
{
    public function index()
    {
        $units = Unit::with(
            'lessons.readingMaterial'
        )
            ->orderBy('order_number')
            ->get();

        return view(
            'admin.learning.index',
            compact('units')
        );
    }
}