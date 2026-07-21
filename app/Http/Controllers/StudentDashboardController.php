<?php

namespace App\Http\Controllers;

use App\Models\AssessmentSubmission;
use App\Models\Unit;
use App\Models\UserLessonProgress;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class StudentDashboardController extends Controller
{
    /**
     * Daftar skill yang tersedia dalam setiap tahap pembelajaran.
     */
    private const SKILLS = [
        'listening',
        'reading',
        'writing',
        'speaking',
    ];

    /**
     * Menampilkan dashboard siswa.
     */
    public function index(): View|RedirectResponse
    {
        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | Redirect admin
        |--------------------------------------------------------------------------
        */

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        $userId = $user->id;

        /*
        |--------------------------------------------------------------------------
        | Mengambil seluruh tahap pembelajaran
        |--------------------------------------------------------------------------
        */

        $units = Unit::query()
            ->with([
                'lessons' => function ($query) {
                    $query
                        ->where('status', 'active')
                        ->orderBy('order_number');
                },
            ])
            ->where('status', 'active')
            ->orderBy('order_number')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Progress lesson Unit 1–4
        |--------------------------------------------------------------------------
        */

        $lessonProgress = UserLessonProgress::query()
            ->where('user_id', $userId)
            ->where('status', 'completed')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Progress Pre-test dan Post-test
        |--------------------------------------------------------------------------
        */

        $assessmentSubmissions = AssessmentSubmission::query()
            ->where('user_id', $userId)
            ->where('status', 'completed')
            ->whereNotNull('final_score')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Membentuk data progress setiap tahap
        |--------------------------------------------------------------------------
        */

        $stageData = [];
        $previousStageCompleted = true;

        foreach ($units as $index => $unit) {
            if ($unit->type === 'unit') {
                $completedSkills = $lessonProgress
                    ->where('unit_id', $unit->id)
                    ->pluck('skill_type');
            } else {
                $completedSkills = $assessmentSubmissions
                    ->where('unit_id', $unit->id)
                    ->where('type', $unit->type)
                    ->pluck('skill');
            }

            /*
             * unique() digunakan agar data submission yang terduplikasi
             * tidak membuat progress menjadi lebih dari 100%.
             */
            $completedSkills = $completedSkills
                ->filter(fn ($skill) => in_array($skill, self::SKILLS, true))
                ->unique()
                ->values();

            $completedCount = $completedSkills->count();

            $progressPercentage = count(self::SKILLS) > 0
                ? (int) round(
                    ($completedCount / count(self::SKILLS)) * 100
                )
                : 0;

            $isCompleted = $completedCount >= count(self::SKILLS);

            /*
             * Tahap pertama selalu terbuka.
             * Tahap berikutnya terbuka jika tahap sebelumnya selesai.
             */
            $isUnlocked = $index === 0
                ? true
                : $previousStageCompleted;

            $nextSkill = collect(self::SKILLS)
                ->first(
                    fn ($skill) => !$completedSkills->contains($skill)
                );

            $actionUrl = $this->resolveStageUrl(
                $unit,
                $nextSkill,
                $isUnlocked,
                $isCompleted
            );

            $stageData[$unit->id] = [
                'completed_skills' => $completedSkills->toArray(),
                'completed_count' => $completedCount,
                'total_skills' => count(self::SKILLS),
                'progress' => min($progressPercentage, 100),
                'is_completed' => $isCompleted,
                'is_unlocked' => $isUnlocked,
                'next_skill' => $nextSkill,
                'action_url' => $actionUrl,
            ];

            $previousStageCompleted = $isCompleted;
        }

        /*
        |--------------------------------------------------------------------------
        | Statistik keseluruhan
        |--------------------------------------------------------------------------
        */

        $completedSkillTotal = collect($stageData)
            ->sum('completed_count');

        $totalMissions = $units->count() * count(self::SKILLS);

        $overallProgress = $totalMissions > 0
            ? (int) round(
                ($completedSkillTotal / $totalMissions) * 100
            )
            : 0;

        $completedStages = collect($stageData)
            ->where('is_completed', true)
            ->count();

        $totalStages = $units->count();

        /*
        |--------------------------------------------------------------------------
        | XP dan level
        |--------------------------------------------------------------------------
        |
        | Saat ini tabel users belum memiliki kolom XP dan level.
        | Oleh karena itu, XP dihitung berdasarkan skill yang selesai.
        |
        | 1 skill selesai = 100 XP.
        |--------------------------------------------------------------------------
        */

        $totalXp = $completedSkillTotal * 100;

        $currentLevel = $this->resolveLevel($totalXp);

        /*
        |--------------------------------------------------------------------------
        | Daily streak
        |--------------------------------------------------------------------------
        */

        $dailyStreak = $this->calculateDailyStreak(
            $lessonProgress,
            $assessmentSubmissions
        );

        /*
        |--------------------------------------------------------------------------
        | Tahap berikutnya
        |--------------------------------------------------------------------------
        */

        $nextStage = $units->first(function ($unit) use ($stageData) {
            $data = $stageData[$unit->id];

            return $data['is_unlocked']
                && !$data['is_completed'];
        });

        if ($nextStage) {
            $nextActionUrl = $stageData[$nextStage->id]['action_url'];
            $nextActionLabel = 'Continue Learning';
        } elseif ($units->isNotEmpty()) {
            $nextActionUrl = route('progress');
            $nextActionLabel = 'View Progress';
        } else {
            $nextActionUrl = route('missions');
            $nextActionLabel = 'Get Started';
        }

        return view('dashboard', [
            'user' => $user,
            'units' => $units,
            'stageData' => $stageData,

            'skills' => self::SKILLS,

            'totalXp' => $totalXp,
            'dailyStreak' => $dailyStreak,
            'currentLevel' => $currentLevel,

            'completedMissions' => $completedSkillTotal,
            'totalMissions' => $totalMissions,

            'completedStages' => $completedStages,
            'totalStages' => $totalStages,

            'overallProgress' => $overallProgress,

            'nextStage' => $nextStage,
            'nextActionUrl' => $nextActionUrl,
            'nextActionLabel' => $nextActionLabel,
        ]);
    }

    /**
     * Menentukan URL tujuan untuk setiap tahap.
     */
    private function resolveStageUrl(
        Unit $unit,
        ?string $nextSkill,
        bool $isUnlocked,
        bool $isCompleted
    ): string {
        if (!$isUnlocked) {
            return '#';
        }

        if ($isCompleted || !$nextSkill) {
            return route('missions');
        }

        /*
         * Pre-test dan Post-test menggunakan assessment generik.
         */
        if (in_array($unit->type, ['pretest', 'posttest'], true)) {
            return route('student.assessment.show', [
                'type' => $unit->type,
                'skill' => $nextSkill,
            ]);
        }

        /*
         * Unit 1–4 menggunakan lesson berdasarkan skill.
         */
        $lesson = $unit->lessons
            ->firstWhere('skill_type', $nextSkill);

        if (!$lesson) {
            return route('missions');
        }

        return match ($nextSkill) {
            'listening' => route('student.listening', [
                'lesson' => $lesson->id,
            ]),

            'reading' => route('student.reading', [
                'lesson' => $lesson->id,
            ]),

            'writing' => route('student.writing', [
                'lesson' => $lesson->id,
            ]),

            'speaking' => route('student.speaking', [
                'lesson' => $lesson->id,
            ]),

            default => route('missions'),
        };
    }

    /**
     * Menentukan level berdasarkan total XP.
     */
    private function resolveLevel(int $totalXp): string
    {
        return match (true) {
            $totalXp >= 1800 => 'Advanced',
            $totalXp >= 1200 => 'Upper Intermediate',
            $totalXp >= 800 => 'Intermediate',
            $totalXp >= 400 => 'Elementary',
            default => 'Beginner',
        };
    }

    /**
     * Menghitung jumlah hari belajar secara berturut-turut.
     */
    private function calculateDailyStreak(
        Collection $lessonProgress,
        Collection $assessmentSubmissions
    ): int {
        $lessonDates = $lessonProgress
            ->pluck('completed_at')
            ->filter();

        $assessmentDates = $assessmentSubmissions
            ->pluck('submitted_at')
            ->filter();

        $activityDates = $lessonDates
            ->merge($assessmentDates)
            ->map(function ($date) {
                return Carbon::parse($date)->toDateString();
            })
            ->unique()
            ->sortDesc()
            ->values();

        if ($activityDates->isEmpty()) {
            return 0;
        }

        $today = Carbon::today();
        $latestActivity = Carbon::parse($activityDates->first())->startOfDay();

        /*
         * Streak tetap aktif jika aktivitas terakhir terjadi hari ini
         * atau kemarin.
         */
        if (
            !$latestActivity->isSameDay($today)
            && !$latestActivity->isSameDay($today->copy()->subDay())
        ) {
            return 0;
        }

        $cursor = $latestActivity->copy();
        $streak = 0;

        while ($activityDates->contains($cursor->toDateString())) {
            $streak++;
            $cursor->subDay();
        }

        return $streak;
    }
}