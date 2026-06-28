<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Lesson;
use App\Models\ReadingQuestion;
use App\Models\ListeningQuestion;
use App\Models\WritingQuestion;
use App\Models\SpeakingQuestion;
use Illuminate\Http\Request;

class StudentAssessmentController extends Controller
{
    public function show($type, $skill)
    {
        if (!in_array($type, ['pretest', 'posttest'])) {
            abort(404);
        }

        if (!in_array($skill, ['listening', 'reading', 'writing', 'speaking'])) {
            abort(404);
        }

        $unit = Unit::where('type', $type)
            ->where('status', 'active')
            ->firstOrFail();

        $lesson = Lesson::where('unit_id', $unit->id)
            ->where('skill_type', $skill)
            ->where('status', 'active')
            ->firstOrFail();

        if ($skill === 'reading') {
            $questions = ReadingQuestion::where('lesson_id', $lesson->id)
                ->whereNull('reading_material_id')
                ->get();
        } elseif ($skill === 'listening') {
            $questions = ListeningQuestion::where('lesson_id', $lesson->id)
                ->whereNull('listening_material_id')
                ->get();
        } elseif ($skill === 'writing') {
            $questions = WritingQuestion::where('lesson_id', $lesson->id)
                ->whereNull('writing_material_id')
                ->get();
        } else {
            $questions = SpeakingQuestion::where('lesson_id', $lesson->id)
                ->whereNull('speaking_material_id')
                ->get();
        }

        return view('missions.assessment.show', [
            'type' => $type,
            'skill' => $skill,
            'unit' => $unit,
            'lesson' => $lesson,
            'questions' => $questions,
        ]);
    }

    public function submit(Request $request, $type, $skill)
    {
        if (!in_array($type, ['pretest', 'posttest'])) {
            abort(404);
        }

        if (!in_array($skill, ['listening', 'reading', 'writing', 'speaking'])) {
            abort(404);
        }

        $answers = $request->input('answers', []);

        if ($skill === 'reading') {
            $questions = ReadingQuestion::whereIn('id', array_keys($answers))->get();
        } elseif ($skill === 'listening') {
            $questions = ListeningQuestion::whereIn('id', array_keys($answers))->get();
        } else {
            return back()->with('success', 'Jawaban berhasil dikirim. Penilaian Writing/Speaking akan dibuat pada tahap berikutnya.');
        }

        $totalScore = 0;
        $maxScore = $questions->sum('score');

        foreach ($questions as $question) {
            if (($answers[$question->id] ?? null) === $question->correct_answer) {
                $totalScore += $question->score;
            }
        }

        $finalScore = $maxScore > 0
            ? round(($totalScore / $maxScore) * 100)
            : 0;

        return back()->with('success', 'Jawaban berhasil dikirim. Nilai kamu: ' . $finalScore);
    }
}