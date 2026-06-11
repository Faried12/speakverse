<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VocabularyPretestController;
use App\Http\Controllers\AdminVocabularyPretestController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MissionController;
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

    /*
    |--------------------------------------------------------------------------
    | Dashboard Redirect
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', function () {

        // admin redirect
        if (Auth::user()->role === 'admin') {

            return redirect('/admin/dashboard');

        }

        // student dashboard
        return view('dashboard');

    })->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | Student Pages
    |--------------------------------------------------------------------------
    */

    Route::get('/missions', function () {

        return view('missions.index');

    })->name('missions');

    Route::get('/missions/pretest', function () {

        return view('missions.pretest');

    })->name('missions.pretest');

    // Route::get(
    //     '/missions/unit1/reading',
    //     [StudentReadingController::class, 'index']
    // )->name('student.reading');

    Route::get(
        '/missions/unit1/reading',
        [StudentReadingController::class, 'reading']
    )->name('student.reading');

    Route::get(
        '/missions/unit1/reading/quiz',
        [StudentReadingController::class, 'quiz']
    )->name('student.reading.quiz');

    Route::get(
        '/missions/unit1/speaking',
        [StudentSpeakingController::class, 'index']
    )->name('student.speaking');

    Route::post(
        '/missions/unit1/speaking/{material}/submit',
        [StudentSpeakingController::class, 'submit']
    )->name('student.speaking.submit');

    Route::get(
        '/missions/unit1/speaking/quiz',
        [StudentSpeakingController::class, 'quiz']
    )->name('student.speaking.quiz');

    Route::get(
        '/missions/unit1/writing',
        [StudentWritingController::class, 'index']
    )->name('student.writing');

    // Route::post(
    //     '/missions/unit1/writing/{question}/submit',
    //     [StudentWritingController::class, 'submit']
    // )->name('student.writing.submit');

    Route::post(
        '/missions/unit1/writing/{material}/submit',
        [StudentWritingController::class, 'submit']
    )->name('student.writing.submit');

    Route::get(
        '/missions/unit1/writing/quiz',
        [StudentWritingController::class, 'quiz']
    )->name('student.writing.quiz');

    Route::get(
        '/missions/unit1/writing/result/{submission}',
        [StudentWritingController::class, 'result']
    )->name('student.writing.result');

    

    

    Route::get('/practice', function () {

        return view('practice.index');

    })->name('practice');

    Route::get('/progress', function () {

        return view('progress.index');

    })->name('progress');


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
    | Vocabullary Pretest
    |--------------------------------------------------------------------------
    */
    Route::get(
        '/vocabulary/pretest',
        [VocabularyPretestController::class,'index']
    )->name('vocabulary.pretest');

    Route::post(
        '/vocabulary/pretest/submit',
        [VocabularyPretestController::class,'submit']
    )->name('vocabulary.pretest.submit');


});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified', 'admin'])
    ->prefix('admin')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Admin Dashboard
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/dashboard',
            [DashboardController::class, 'index']
        )->name('admin.dashboard');

        /*
        |--------------------------------------------------------------------------
        | Admin Profile
        |--------------------------------------------------------------------------
        */

        Route::get('/profile', [ProfileController::class, 'edit'])
            ->name('admin.profile.edit');

        /*
        |--------------------------------------------------------------------------
        | Admin Users
        |--------------------------------------------------------------------------
        */

        Route::get('/users', function () {

            $users = \App\Models\User::latest('created_at')->get(['*']);

            return view('admin.users.index', [
                'users' => $users
            ]);

        })->name('admin.users');

        /*
        |--------------------------------------------------------------------------
        | Admin Missions
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/missions',
            [MissionController::class, 'index']
        )->name('admin.missions');

        Route::post(
            '/missions',
            [MissionController::class, 'store']
        )->name('admin.missions.store');

        Route::get(
            '/missions/{id}/edit',
            [MissionController::class, 'edit']
        )->name('admin.missions.edit');

        Route::put(
            '/missions/{id}',
            [MissionController::class, 'update']
        )->name('admin.missions.update');

        Route::delete(
            '/missions/{id}',
            [MissionController::class, 'destroy']
        )->name('admin.missions.destroy');

        /*
        |--------------------------------------------------------------------------
        | Admin Pretests
        |--------------------------------------------------------------------------
        */
        Route::get('/pretests', function () {
            return view('admin.pretests.index');
        })->name('admin.pretests');

        /*
        |--------------------------------------------------------------------------
        | Admin Mission-Vocabulary
        |--------------------------------------------------------------------------
        */
        Route::resource(
            'vocabulary-pretests',
            AdminVocabularyPretestController::class
        )->names('admin.vocabulary-pretests');

        /*
        |--------------------------------------------------------------------------
        | Admin Practice
        |--------------------------------------------------------------------------
        */

        Route::get('/practices', function () {

            return view('admin.practices.practice');

        })->name('admin.practices');

        /*
        |--------------------------------------------------------------------------
        | Admin Analytics
        |--------------------------------------------------------------------------
        */

        Route::get('/analytics', function () {

            return view('admin.analytics.analytic');

        })->name('admin.analytics');

        /*
        |--------------------------------------------------------------------------
        | Admin learning
        |--------------------------------------------------------------------------
        */
        Route::get(
            '/learning',
            [LearningContentController::class, 'index']
        )->name('admin.learning');

        Route::get(
            '/reading-materials/{lesson}',
            [ReadingMaterialController::class, 'index']
        )->name('admin.reading-materials.index');

        Route::get(
            '/reading-materials/{lesson}/create',
            [ReadingMaterialController::class, 'create']
        )->name('admin.reading-materials.create');

        Route::post(
            '/reading-materials/{lesson}',
            [ReadingMaterialController::class, 'store']
        )->name('admin.reading-materials.store');

        Route::get(
            '/reading-materials/{material}/edit',
            [ReadingMaterialController::class, 'edit']
        )->name('admin.reading-materials.edit');

        Route::put(
            '/reading-materials/{material}',
            [ReadingMaterialController::class, 'update']
        )->name('admin.reading-materials.update');

        Route::delete(
            '/reading-materials/{material}',
            [ReadingMaterialController::class, 'destroy']
        )->name('admin.reading-materials.destroy');

        Route::get(
            '/reading-questions/{material}',
            [ReadingQuestionController::class, 'index']
        )->name('admin.reading-questions.index');

        Route::get(
            '/reading-questions/{material}/create',
            [ReadingQuestionController::class, 'create']
        )->name('admin.reading-questions.create');

        Route::post(
            '/reading-questions/{material}',
            [ReadingQuestionController::class, 'store']
        )->name('admin.reading-questions.store');

        Route::get(
            '/reading-questions/{question}/edit',
            [ReadingQuestionController::class, 'edit']
        )->name('admin.reading-questions.edit');

        Route::put(
            '/reading-questions/{question}',
            [ReadingQuestionController::class, 'update']
        )->name('admin.reading-questions.update');

        Route::delete(
            '/reading-questions/{question}',
            [ReadingQuestionController::class, 'destroy']
        )->name('admin.reading-questions.destroy');

        Route::get(
            '/speaking-materials/{lesson}',
            [SpeakingMaterialController::class, 'index']
        )->name('admin.speaking-materials.index');

        Route::get(
            '/speaking-materials/{lesson}/create',
            [SpeakingMaterialController::class, 'create']
        )->name('admin.speaking-materials.create');

        Route::post(
            '/speaking-materials/{lesson}',
            [SpeakingMaterialController::class, 'store']
        )->name('admin.speaking-materials.store');

        Route::get(
            '/speaking-materials/{material}/edit',
            [SpeakingMaterialController::class, 'edit']
        )->name('admin.speaking-materials.edit');

        Route::put(
            '/speaking-materials/{material}',
            [SpeakingMaterialController::class, 'update']
        )->name('admin.speaking-materials.update');

        Route::delete(
            '/speaking-materials/{material}',
            [SpeakingMaterialController::class, 'destroy']
        )->name('admin.speaking-materials.destroy');

        Route::get(
            '/speaking-questions/{material}',
            [SpeakingQuestionController::class, 'index']
        )->name('admin.speaking-questions.index');

        Route::get(
            '/speaking-questions/{material}/create',
            [SpeakingQuestionController::class, 'create']
        )->name('admin.speaking-questions.create');

        Route::post(
            '/speaking-questions/{material}',
            [SpeakingQuestionController::class, 'store']
        )->name('admin.speaking-questions.store');

        Route::get(
            '/speaking-question/{question}/edit',
            [SpeakingQuestionController::class, 'edit']
        )->name('admin.speaking-questions.edit');

        Route::put(
            '/speaking-question/{question}',
            [SpeakingQuestionController::class, 'update']
        )->name('admin.speaking-questions.update');

        Route::delete(
            '/speaking-question/{question}',
            [SpeakingQuestionController::class, 'destroy']
        )->name('admin.speaking-questions.destroy');

        Route::get(
        '/writing-materials/{lesson}',
        [WritingMaterialController::class, 'index']
        )->name('admin.writing-materials.index');

        Route::get(
        '/writing-materials/{lesson}/create',
        [WritingMaterialController::class, 'create']
        )->name('admin.writing-materials.create');

        Route::post(
        '/writing-materials/{lesson}',
        [WritingMaterialController::class, 'store']
        )->name('admin.writing-materials.store');

        Route::get(
        '/writing-materials/{material}/edit',
        [WritingMaterialController::class, 'edit']
        )->name('admin.writing-materials.edit');

        Route::put(
        '/writing-materials/{material}',
        [WritingMaterialController::class, 'update']
        )->name('admin.writing-materials.update');

        Route::delete(
        '/writing-materials/{material}',
        [WritingMaterialController::class, 'destroy']
        )->name('admin.writing-materials.destroy');

        /*
        Writing Questions
        --------------------------------------------------------------------------
        */

        Route::get(
        '/writing-questions/{material}',
        [WritingQuestionController::class, 'index']
        )->name('admin.writing-questions.index');

        Route::get(
        '/writing-questions/{material}/create',
        [WritingQuestionController::class, 'create']
        )->name('admin.writing-questions.create');

        Route::post(
        '/writing-questions/{material}',
        [WritingQuestionController::class, 'store']
        )->name('admin.writing-questions.store');

        Route::get(
        '/writing-question/{question}/edit',
        [WritingQuestionController::class, 'edit']
        )->name('admin.writing-questions.edit');

        Route::put(
        '/writing-question/{question}',
        [WritingQuestionController::class, 'update']
        )->name('admin.writing-questions.update');

        Route::delete(
        '/writing-question/{question}',
        [WritingQuestionController::class, 'destroy']
        )->name('admin.writing-questions.destroy');

    });

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';