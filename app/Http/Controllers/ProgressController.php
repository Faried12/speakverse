<?php

namespace App\Http\Controllers;

use App\Models\AssessmentSubmission;
use App\Models\UserLessonProgress;
use App\Models\Lesson;
use Illuminate\Support\Facades\Auth;

class ProgressController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $submissions = AssessmentSubmission::with(['unit', 'lesson'])
            ->where('user_id', $userId)
            ->latest('submitted_at')
            ->get();

        $completed = $submissions
            ->where('status', 'completed')
            ->whereNotNull('final_score');

        $lessonProgress = UserLessonProgress::where('user_id', $userId)
            ->where('status', 'completed')
            ->latest('completed_at')
            ->get();

        $averageScore = round($completed->avg('final_score') ?? 0);

        $totalCompleted = $completed->count() + $lessonProgress->count();

        $pretestAverage = round(
            $completed->where('type', 'pretest')->avg('final_score') ?? 0
        );

        $posttestAverage = round(
            $completed->where('type', 'posttest')->avg('final_score') ?? 0
        );

        $skills = [
            'listening',
            'reading',
            'writing',
            'speaking',
        ];

        $skillAverages = [];

        foreach ($skills as $skill) {
            $totalLessons = Lesson::where('skill_type', $skill)
                ->where('status', 'active')
                ->count();

            $completedLessons = UserLessonProgress::where('user_id', $userId)
                ->where('skill_type', $skill)
                ->where('status', 'completed')
                ->count();

            $skillAverages[$skill] = $totalLessons > 0
                ? round(($completedLessons / $totalLessons) * 100)
                : 0;
        }

        $bestSubmission = $completed->sortByDesc('final_score')->first();
        $latestSubmission = $completed->first();

        return view('progress.index', compact(
            'submissions',
            'completed',
            'lessonProgress',
            'averageScore',
            'totalCompleted',
            'pretestAverage',
            'posttestAverage',
            'skillAverages',
            'bestSubmission',
            'latestSubmission'
        ));
    }
}