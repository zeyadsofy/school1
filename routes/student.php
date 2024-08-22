<?php

use App\Http\Controllers\Students\LibraryController;
use App\Models\Library;
use App\Models\online_classe;
use App\Models\Student;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;






/*
|--------------------------------------------------------------------------
| student Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//==============================Translate all pages============================
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:student']
    ], function () {

    //==============================dashboard============================
    Route::get('/student/dashboard', function () {

        $library = Library::all();
        $ids = DB::table('students')->where('id', auth()->user()->id)->pluck('Classroom_id');

        $online_classes = online_classe::where("Classroom_id",$ids)->get();
        // return $ids;
    //    return $online_classes;

        return view('pages.Students.dashboard',compact("library","ids"));
    });
//     Route::get('quiz/{quiz_id}', [ExamsController::class, 'show'])->name('quiz.show');

// // Route to submit answers
// Route::post('quiz/submit', [ExamsController::class, 'submitAnswer'])->name('quiz.submit');
    
    Route::group(['namespace' => 'Students\dashboard'], function () {
        Route::resource('student_exams', 'ExamsController');
        Route::resource('profile-student', 'ProfileController');
        // routes/web.php
    Route::get('/fetch-question', 'App\Http\Controllers\Students\dashboard\ExamsController@fetchQuestion');
    Route::post('/next-question', 'App\Http\Controllers\Students\dashboard\ExamsController@nextQuestion');

    });
    Route::group(['namespace' => 'Students'], function () {
        Route::get('download_file/{filename}', 'LibraryController@downloadAttachment')->name('downloadAttachment');

    });

});
