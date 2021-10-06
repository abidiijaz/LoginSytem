<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;


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

Auth::routes();

Route::get('/', 'HomeController@index');


Route::prefix('/teacher')->namespace('Teacher')->group(function(){
    Route::match(['get','post'],'/','teacherController@login');
    Route::group(['middleware'=>['teacher']],function(){
        Route::get('/dashboard','teacherController@index');
        Route::get('/logout','teacherController@Logout');
        Route::get('/quiz/{id}','teacherController@Quiz');
        Route::post('/quiz','teacherController@AddQuiz');
        Route::get('deletequiz/{id}','teacherController@deleteQuiz');
        Route::get('question/{id}','teacherController@quizLink');
        Route::post('question','teacherController@addQuestion');
        Route::get('viewstudents','teacherController@ViewVtudents');
    });
});

Route::prefix('/admin')->namespace('Admin')->group(function(){
    Route::match(['get','post'],'/','AdminController@login')->name('admin');
    Route::group(['middleware'=>['admin']],function(){
       Route::get('dashboard','AdminController@index');
       Route::get('viewstudent','AdminController@Total_Students');
       Route::get('courseselection/{id}','AdminController@CourseSelection');
       Route::get('totalteacher','AdminController@TotalTeacher');
       Route::post('selectedcourse','AdminController@SelectedCourse');
        Route::get('assignsubject/{id}','AdminController@AssignSubject');
        Route::post('assign-class','AdminController@AssignClass');
       Route::get('classSubject','AdminController@ClassSubject');
       Route::post('addClassName','adminController@AddClassName');
        Route::post('addsubject','AdminController@AddSubject');
        Route::post('enrollstudent','AdminController@EnrollStudent');

    });
});



