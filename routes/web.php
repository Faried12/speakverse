<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VocabularyPretestController;
use App\Http\Controllers\AdminVocabularyPretestController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MissionController;

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

    });

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';