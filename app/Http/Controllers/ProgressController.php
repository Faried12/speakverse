<?php

namespace App\Http\Controllers;

use App\Models\AssessmentSubmission;
use Illuminate\Support\Facades\Auth;

class ProgressController extends Controller
{
    public function index()
    {
        $submissions = AssessmentSubmission::with(['unit', 'lesson'])
            ->where('user_id', Auth::id())
            ->latest('submitted_at')
            ->get();

        $completed = $submissions->where('status', 'completed');

        $averageScore = round($completed->avg('final_score') ?? 0);

        $totalCompleted = $completed->count();

        $latestScore = $completed->first()?->final_score ?? 0;

        $pretestAverage = round(
            $completed->where('type', 'pretest')->avg('final_score') ?? 0
        );

        $posttestAverage = round(
            $completed->where('type', 'posttest')->avg('final_score') ?? 0
        );

        $skillAverages = [
            'listening' => round($completed->where('skill', 'listening')->avg('final_score') ?? 0),
            'reading' => round($completed->where('skill', 'reading')->avg('final_score') ?? 0),
            'writing' => round($completed->where('skill', 'writing')->avg('final_score') ?? 0),
            'speaking' => round($completed->where('skill', 'speaking')->avg('final_score') ?? 0),
        ];

        return view('progress.index', compact(
            'submissions',
            'averageScore',
            'totalCompleted',
            'latestScore',
            'pretestAverage',
            'posttestAverage',
            'skillAverages'
        ));
    }
}