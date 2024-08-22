<?php

use App\Http\Controllers\Grades\GradeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Parents\ParentController;
use App\Http\Controllers\Parents\ParentsContoller;
use App\Http\Livewire\AddParent;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;









/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//  Auth::routes();
Route::get('/', [HomeController::class, "index"])->name('selection');


Route::group(['namespace' => 'Auth'], function () {
    Route::get('/login/{type}','LoginController@loginForm')->middleware('guest')->name('login.show');
    Route::post('/login','LoginController@login')->name('login');
    Route::get('/logout/{type}', 'LoginController@logout')->name('logout');
    });


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ], function () {
        // Route::get('/', [CalendarController::class, "index"])->name("calender.index");
       
    //  ==============================dashboard============================
    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

//    ==============================dashboard============================
    Route::group(['namespace' => 'Grades'], function () {
        Route::resource('Grades', 'GradeController');
    });

    //==============================Classrooms============================
    Route::group(['namespace' => 'Classrooms'], function () {
        Route::resource('Classrooms', 'ClassroomController');

        Route::post('Filter_Classes', 'ClassroomController@Filter_Classes')->name('Filter_Classes');
    });


    Route::group(['namespace' => 'Sections'], function () {
        Route::resource('Sections', 'SectionController');
        Route::get('/classes/{id}', 'SectionController@getclasses');
    });

    
    Route::group(['namespace' => 'Parents'], function () {
        Route::resource('Parents', 'ParentController');
    });

    Route::group(['namespace' => 'Teachers'], function () {
        Route::resource('Teachers', 'TeacherController');
    });

    Route::group(['namespace' => 'Students'], function () {
        Route::resource('Students', 'StudentController');
        Route::resource('Graduated', 'GraduatedController');
        Route::resource('Promotion', 'PromotionController');
        Route::resource('Attendance', 'AttendanceController');
        Route::get('/indirect_admin', 'OnlineClasseController@indirectCreate')->name('indirect.create');
        Route::post('/indirect_admin', 'OnlineClasseController@storeIndirect')->name('indirect.store');
        // Route::get('/Get_classrooms/{id}', 'StudentController@Get_classrooms');
        // Route::get('/Get_Sections/{id}', 'StudentController@Get_Sections');
        Route::resource('online_classes', 'OnlineClasseController');
        Route::get('download_file/{filename}', 'LibraryController@downloadAttachment')->name('downloadAttachment');
        Route::resource('library', 'LibraryController');
    });

    Route::group(['namespace' => 'Subjects'], function () {
        Route::resource('subjects', 'SubjectController');
    });

    Route::group(['namespace' => 'Quizzes'], function () {
        Route::resource('Quizzes', 'QuizzController');
    });
    Route::group(['namespace' => 'questions'], function () {
        Route::resource('questions', 'QuestionController');
    });

});

