<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'TutionController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Teacher view
Route::view('student/register', 'auth.student-register')->name('student.register');
Route::post('student/register', 'Auth\StudentRegisterController@studentRegister')->name('stu.register');


//Student Profile
Route::get('student/create', 'StudentController@create')->name('student.view');
Route::post('student/create', 'StudentController@store')->name('student.store');
Route::post('student/coverphoto', 'StudentController@coverPhoto')->name('cover.photo');
Route::post('student/logo', 'StudentController@studentLogo')->name('student.logo');
Route::get('/student/{id}/{student}', 'StudentController@index')->name('student.index');
Route::get('/jobs/my-job', 'JobController@myjob')->name('my.job');
Route::post('/jobs/my-job/destroy', 'JobController@destroy')->name('job.delete');

//tutions
Route::get('/tutions/create', 'TutionController@create')->name('tution.create');
Route::post('/tutions/create', 'TutionController@store')->name('tution.store');
Route::get('/tutions/{id}/edit', 'TutionController@edit')->name('tution.edit');
Route::post('/tutions/{id}/edit', 'TutionController@update')->name('tution.update');
Route::get('/tutions/{id}/{tution}', 'TutionController@show')->name('tutions.show');
Route::get('/tutions/alltutions', 'TutionController@alltutions')->name('alltutions');
Route::get('/tutions/applications', 'TutionController@applicant')->name('applicant');
