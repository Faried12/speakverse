<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VocabularyPretestController;
use App\Http\Controllers\AdminVocabularyPretestController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LearningContentController;
use App\Http\Controllers\Admin\ReadingMaterialController;
use App\Http\Controllers\Admin\ReadingQuestionController;
use App\Http\Controllers\StudentReadingController;
use App\Http\Controllers\Admin\SpeakingMaterialController;
use App\Http\Controllers\StudentSpeakingController;
use App\Http\Controllers\Admin\SpeakingQuestionController;
use App\Http\Controllers\Admin\WritingMaterialController;
use App\Http\Controllers\Admin\WritingQuestionController;
use App\Http\Controllers\StudentWritingController;
use App\Http\Controllers\Admin\ListeningMaterialController;
use App\Http\Controllers\Admin\ListeningQuestionController;
use App\Http\Controllers\StudentListeningController;
use App\Http\Controllers\StudentAssessmentController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\Admin\AnalyticsController;
use App\Http\Controllers\StudentDashboardController;

/*
|--------------------------------------------------------------------------
| Landing
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('/login');
});

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', [StudentDashboardController::class, 'index'])
        ->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | Student Pages
    |--------------------------------------------------------------------------
    */

    Route::get('/missions', [MissionController::class, 'index'])
        ->name('missions');

    Route::get('/missions/pretest', function () {
        return view('missions.pretest');
    })->name('missions.pretest');

    /*
    |--------------------------------------------------------------------------
    | Student Unit Missions
    |--------------------------------------------------------------------------
    */

    Route::get('/missions/unit/{lesson}/listening', [StudentListeningController::class, 'listening'])
        ->name('student.listening');

    Route::get('/missions/unit/{lesson}/listening/quiz', [StudentListeningController::class, 'quiz'])
        ->name('student.listening.quiz');

    Route::get('/missions/unit/{lesson}/reading', [StudentReadingController::class, 'reading'])
        ->name('student.reading');

    Route::get('/missions/unit/{lesson}/reading/quiz', [StudentReadingController::class, 'quiz'])
        ->name('student.reading.quiz');

    Route::get('/missions/unit/{lesson}/writing', [StudentWritingController::class, 'index'])
        ->name('student.writing');

    Route::get('/missions/unit/{lesson}/writing/quiz', [StudentWritingController::class, 'quiz'])
        ->name('student.writing.quiz');

    Route::post('/missions/unit/{lesson}/writing/{material}/submit', [StudentWritingController::class, 'submit'])
        ->name('student.writing.submit');

    Route::get('/missions/unit/{lesson}/speaking', [StudentSpeakingController::class, 'index'])
        ->name('student.speaking');

    Route::get('/missions/unit/{lesson}/speaking/quiz', [StudentSpeakingController::class, 'quiz'])
        ->name('student.speaking.quiz');

    Route::post('/missions/unit/{lesson}/speaking/{material}/submit', [StudentSpeakingController::class, 'submit'])
        ->name('student.speaking.submit');

    Route::post('/missions/unit/{lesson}/reading/complete', [StudentReadingController::class, 'complete'])
    ->name('student.reading.complete');

    Route::post('/missions/unit/{lesson}/listening/complete', [StudentListeningController::class, 'complete'])
        ->name('student.listening.complete');

    /*
    |--------------------------------------------------------------------------
    | Generic Assessment Route
    |--------------------------------------------------------------------------
    */

    Route::get('/missions/assessment/result/{submission}', [StudentAssessmentController::class, 'result'])
        ->name('student.assessment.result');

    Route::get('/missions/{type}/{skill}', [StudentAssessmentController::class, 'show'])
        ->name('student.assessment.show');

    Route::post('/missions/{type}/{skill}/submit', [StudentAssessmentController::class, 'submit'])
        ->name('student.assessment.submit');

    /*
    |--------------------------------------------------------------------------
    | Progress
    |--------------------------------------------------------------------------
    */

    Route::get('/progress', [ProgressController::class, 'index'])
        ->name('progress');
        
    /*
    |--------------------------------------------------------------------------
    | Quest Pages
    |--------------------------------------------------------------------------
    */

    Route::get('/speaking-quest', function () {
        return view('speaking.quest');
    })->name('speaking.quest');

    Route::get('/reading-quest', function () {
        return view('reading.quest');
    })->name('reading.quest');

    Route::get('/vocabulary-quest', function () {
        return view('vocabulary.quest');
    })->name('vocabulary.quest');

    /*
    |--------------------------------------------------------------------------
    | User Profile
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    /*
    |--------------------------------------------------------------------------
    | Vocabulary Pretest
    |--------------------------------------------------------------------------
    */

    Route::get('/vocabulary/pretest', [VocabularyPretestController::class, 'index'])
        ->name('vocabulary.pretest');

    Route::post('/vocabulary/pretest/submit', [VocabularyPretestController::class, 'submit'])
        ->name('vocabulary.pretest.submit');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified', 'admin'])
    ->prefix('admin')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('admin.dashboard');

        Route::get('/profile', [ProfileController::class, 'edit'])
            ->name('admin.profile.edit');

        Route::get('/users', function () {
            $users = \App\Models\User::latest('created_at')->get(['*']);

            return view('admin.users.index', [
                'users' => $users
            ]);
        })->name('admin.users');

        Route::resource('vocabulary-pretests', AdminVocabularyPretestController::class)
            ->names('admin.vocabulary-pretests');

        Route::get('/analytics', [AnalyticsController::class, 'index'])
            ->name('admin.analytics');

        Route::get('/learning', [LearningContentController::class, 'index'])
            ->name('admin.learning');

        /*
        |--------------------------------------------------------------------------
        | Reading Materials
        |--------------------------------------------------------------------------
        */

        Route::get('/reading-materials/{lesson}', [ReadingMaterialController::class, 'index'])
            ->name('admin.reading-materials.index');

        Route::get('/reading-materials/{lesson}/create', [ReadingMaterialController::class, 'create'])
            ->name('admin.reading-materials.create');

        Route::post('/reading-materials/{lesson}', [ReadingMaterialController::class, 'store'])
            ->name('admin.reading-materials.store');

        Route::get('/reading-materials/{material}/edit', [ReadingMaterialController::class, 'edit'])
            ->name('admin.reading-materials.edit');

        Route::put('/reading-materials/{material}', [ReadingMaterialController::class, 'update'])
            ->name('admin.reading-materials.update');

        Route::delete('/reading-materials/{material}', [ReadingMaterialController::class, 'destroy'])
            ->name('admin.reading-materials.destroy');

        /*
        |--------------------------------------------------------------------------
        | Reading Questions
        |--------------------------------------------------------------------------
        */

        Route::get('/reading-lesson-questions/{lesson}', [ReadingQuestionController::class, 'lessonIndex'])
            ->name('admin.reading-lesson-questions.index');

        Route::get('/reading-lesson-questions/{lesson}/create', [ReadingQuestionController::class, 'lessonCreate'])
            ->name('admin.reading-lesson-questions.create');

        Route::post('/reading-lesson-questions/{lesson}', [ReadingQuestionController::class, 'lessonStore'])
            ->name('admin.reading-lesson-questions.store');

        Route::get('/reading-questions/{material}', [ReadingQuestionController::class, 'index'])
            ->name('admin.reading-questions.index');

        Route::get('/reading-questions/{material}/create', [ReadingQuestionController::class, 'create'])
            ->name('admin.reading-questions.create');

        Route::post('/reading-questions/{material}', [ReadingQuestionController::class, 'store'])
            ->name('admin.reading-questions.store');

        Route::get('/reading-questions/{question}/edit', [ReadingQuestionController::class, 'edit'])
            ->name('admin.reading-questions.edit');

        Route::put('/reading-questions/{question}', [ReadingQuestionController::class, 'update'])
            ->name('admin.reading-questions.update');

        Route::delete('/reading-questions/{question}', [ReadingQuestionController::class, 'destroy'])
            ->name('admin.reading-questions.destroy');

        /*
        |--------------------------------------------------------------------------
        | Listening Materials
        |--------------------------------------------------------------------------
        */

        Route::get('/listening-materials/{lesson}', [ListeningMaterialController::class, 'index'])
            ->name('admin.listening-materials.index');

        Route::get('/listening-materials/{lesson}/create', [ListeningMaterialController::class, 'create'])
            ->name('admin.listening-materials.create');

        Route::post('/listening-materials/{lesson}', [ListeningMaterialController::class, 'store'])
            ->name('admin.listening-materials.store');

        Route::get('/listening-materials/{material}/edit', [ListeningMaterialController::class, 'edit'])
            ->name('admin.listening-materials.edit');

        Route::put('/listening-materials/{material}', [ListeningMaterialController::class, 'update'])
            ->name('admin.listening-materials.update');

        Route::delete('/listening-materials/{material}', [ListeningMaterialController::class, 'destroy'])
            ->name('admin.listening-materials.destroy');

        /*
        |--------------------------------------------------------------------------
        | Listening Questions
        |--------------------------------------------------------------------------
        */

        Route::get('/listening-lesson-questions/{lesson}', [ListeningQuestionController::class, 'lessonIndex'])
            ->name('admin.listening-lesson-questions.index');

        Route::get('/listening-lesson-questions/{lesson}/create', [ListeningQuestionController::class, 'lessonCreate'])
            ->name('admin.listening-lesson-questions.create');

        Route::post('/listening-lesson-questions/{lesson}', [ListeningQuestionController::class, 'lessonStore'])
            ->name('admin.listening-lesson-questions.store');

        Route::get('/listening-questions/{material}', [ListeningQuestionController::class, 'index'])
            ->name('admin.listening-questions.index');

        Route::get('/listening-questions/{material}/create', [ListeningQuestionController::class, 'create'])
            ->name('admin.listening-questions.create');

        Route::post('/listening-questions/{material}', [ListeningQuestionController::class, 'store'])
            ->name('admin.listening-questions.store');

        Route::get('/listening-questions/{question}/edit', [ListeningQuestionController::class, 'edit'])
            ->name('admin.listening-questions.edit');

        Route::put('/listening-questions/{question}', [ListeningQuestionController::class, 'update'])
            ->name('admin.listening-questions.update');

        Route::delete('/listening-questions/{question}', [ListeningQuestionController::class, 'destroy'])
            ->name('admin.listening-questions.destroy');

        /*
        |--------------------------------------------------------------------------
        | Speaking Materials
        |--------------------------------------------------------------------------
        */

        Route::get('/speaking-materials/{lesson}', [SpeakingMaterialController::class, 'index'])
            ->name('admin.speaking-materials.index');

        Route::get('/speaking-materials/{lesson}/create', [SpeakingMaterialController::class, 'create'])
            ->name('admin.speaking-materials.create');

        Route::post('/speaking-materials/{lesson}', [SpeakingMaterialController::class, 'store'])
            ->name('admin.speaking-materials.store');

        Route::get('/speaking-materials/{material}/edit', [SpeakingMaterialController::class, 'edit'])
            ->name('admin.speaking-materials.edit');

        Route::put('/speaking-materials/{material}', [SpeakingMaterialController::class, 'update'])
            ->name('admin.speaking-materials.update');

        Route::delete('/speaking-materials/{material}', [SpeakingMaterialController::class, 'destroy'])
            ->name('admin.speaking-materials.destroy');

        /*
        |--------------------------------------------------------------------------
        | Speaking Questions
        |--------------------------------------------------------------------------
        */

        Route::get('/speaking-lesson-questions/{lesson}', [SpeakingQuestionController::class, 'lessonIndex'])
            ->name('admin.speaking-lesson-questions.index');

        Route::get('/speaking-lesson-questions/{lesson}/create', [SpeakingQuestionController::class, 'lessonCreate'])
            ->name('admin.speaking-lesson-questions.create');

        Route::post('/speaking-lesson-questions/{lesson}', [SpeakingQuestionController::class, 'lessonStore'])
            ->name('admin.speaking-lesson-questions.store');

        Route::get('/speaking-questions/{material}', [SpeakingQuestionController::class, 'index'])
            ->name('admin.speaking-questions.index');

        Route::get('/speaking-questions/{material}/create', [SpeakingQuestionController::class, 'create'])
            ->name('admin.speaking-questions.create');

        Route::post('/speaking-questions/{material}', [SpeakingQuestionController::class, 'store'])
            ->name('admin.speaking-questions.store');

        Route::get('/speaking-question/{question}/edit', [SpeakingQuestionController::class, 'edit'])
            ->name('admin.speaking-questions.edit');

        Route::put('/speaking-question/{question}', [SpeakingQuestionController::class, 'update'])
            ->name('admin.speaking-questions.update');

        Route::delete('/speaking-question/{question}', [SpeakingQuestionController::class, 'destroy'])
            ->name('admin.speaking-questions.destroy');

        /*
        |--------------------------------------------------------------------------
        | Writing Materials
        |--------------------------------------------------------------------------
        */

        Route::get('/writing-materials/{lesson}', [WritingMaterialController::class, 'index'])
            ->name('admin.writing-materials.index');

        Route::get('/writing-materials/{lesson}/create', [WritingMaterialController::class, 'create'])
            ->name('admin.writing-materials.create');

        Route::post('/writing-materials/{lesson}', [WritingMaterialController::class, 'store'])
            ->name('admin.writing-materials.store');

        Route::get('/writing-materials/{material}/edit', [WritingMaterialController::class, 'edit'])
            ->name('admin.writing-materials.edit');

        Route::put('/writing-materials/{material}', [WritingMaterialController::class, 'update'])
            ->name('admin.writing-materials.update');

        Route::delete('/writing-materials/{material}', [WritingMaterialController::class, 'destroy'])
            ->name('admin.writing-materials.destroy');

        /*
        |--------------------------------------------------------------------------
        | Writing Questions
        |--------------------------------------------------------------------------
        */

        Route::get('/writing-lesson-questions/{lesson}', [WritingQuestionController::class, 'lessonIndex'])
            ->name('admin.writing-lesson-questions.index');

        Route::get('/writing-lesson-questions/{lesson}/create', [WritingQuestionController::class, 'lessonCreate'])
            ->name('admin.writing-lesson-questions.create');

        Route::post('/writing-lesson-questions/{lesson}', [WritingQuestionController::class, 'lessonStore'])
            ->name('admin.writing-lesson-questions.store');

        Route::get('/writing-questions/{material}', [WritingQuestionController::class, 'index'])
            ->name('admin.writing-questions.index');

        Route::get('/writing-questions/{material}/create', [WritingQuestionController::class, 'create'])
            ->name('admin.writing-questions.create');

        Route::post('/writing-questions/{material}', [WritingQuestionController::class, 'store'])
            ->name('admin.writing-questions.store');

        Route::get('/writing-question/{question}/edit', [WritingQuestionController::class, 'edit'])
            ->name('admin.writing-questions.edit');

        Route::put('/writing-question/{question}', [WritingQuestionController::class, 'update'])
            ->name('admin.writing-questions.update');

        Route::delete('/writing-question/{question}', [WritingQuestionController::class, 'destroy'])
            ->name('admin.writing-questions.destroy');
    });

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';