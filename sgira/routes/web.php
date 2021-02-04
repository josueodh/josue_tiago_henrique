<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return view('layouts.master');
    })->name('home');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/grafico', function () {
        return view('charts.approval');
    });
    Route::get('/dashboard/{course}', 'CourseController@dashboard')->name('courses.dashboard');
    Route::get('/comunicado', 'TeacherController@communicate')->name('teachers.communicate');
    Route::post('/comunicado', 'TeacherController@sendCommunicate')->name('teachers.sendCommunicate');
    Route::resource('/cursos', 'CourseController')->names('courses')->parameters(['cursos' => 'course']);
    Route::resource('/materias', 'SubjectController')->names('subjects')->parameters(['materias' => 'subject']);

    Route::resource('/alunos', 'StudentController')->names('students')->parameters(['alunos' => 'student']);

    Route::resource('/professores', 'TeacherController')->names('teachers')->parameters(['professores' => 'teacher']);

    Route::resource('/turmas', 'TeamController')->names('teams')->parameters(['turmas' => 'team']);

    Route::resource('/parceiros', 'PartnerController')->names('partners')->parameters(['parceiros' => 'partner']);;


    Route::prefix('notificacoes')->group(function () {
        Route::get('/', 'NotificationController@index')->name('notifications.index');
        Route::get('/{category}', 'NotificationController@show')->name('notifications.show');
        Route::get('/leitura/{notify}', 'NotificationController@read')->name('notifications.read');
    });
});
