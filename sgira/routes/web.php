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

    Route::get('/dashboard/aluno', 'CourseController@dashboardStudent')->name('courses.dashboardStudent');
    Route::get('/', function () {
        return view('layouts.master');
    })->name('home');
    Route::get('/home', 'HomeController@index')->name('home');
    route::get('/turma/ranking/{team}', 'TeamController@ranking')->name('teams.ranking');
    Route::get('/materia/grafico/{subject}', 'SubjectController@dashboard')->name('subjects.dashboard');
    Route::get('/dashboard/{course}', 'CourseController@dashboard')->name('courses.dashboard');
    Route::get('/comunicado', 'TeacherController@communicate')->name('teachers.communicate');
    Route::post('/comunicado', 'TeacherController@sendCommunicate')->name('teachers.sendCommunicate');
    Route::resource('/cursos', 'CourseController')->names('courses')->parameters(['cursos' => 'course']);
    Route::resource('/materias', 'SubjectController')->names('subjects')->parameters(['materias' => 'subject']);

    Route::resource('/alunos', 'StudentController')->names('students')->parameters(['alunos' => 'student']);

    Route::resource('/professores', 'TeacherController')->names('teachers')->parameters(['professores' => 'teacher']);
    Route::post('/teste/{team}', 'TeamController@bonificating')->name('teams.close');

    Route::get('/turmas/enroll/{team}', 'TeamController@enroll')->name('teams.enroll');
    Route::resource('/turmas', 'TeamController')->names('teams')->parameters(['turmas' => 'team']);

    Route::resource('/parceiros', 'PartnerController')->names('partners')->parameters(['parceiros' => 'partner']);

    Route::resource('/bonificacoes', 'BonificationController')->names('bonifications')->parameters(['bonificacoes' => 'bonification']);

    Route::resource('/notas', 'GradeController')->names('grades')->parameters(['notas' => 'grade'])->only('store', 'update', 'destroy', 'show');
    Route::get('/notas/{team}/index', 'GradeController@index')->name('grades.index');
    Route::get('/notas/{team}/create', 'GradeController@create')->name('grades.create');
    Route::get('/notas/{team}/{grade}/edit', 'GradeController@edit')->name('grades.edit');

    Route::prefix('metaIra')->group(function () {
        Route::get('/edit', 'IraGoalController@edit')->name('iraGoal.edit');
        Route::put('/update', 'IraGoalController@update')->name('iraGoal.update');
    });

    Route::prefix('notificacoes')->group(function () {
        Route::get('/', 'NotificationController@index')->name('notifications.index');
        Route::get('/{category}', 'NotificationController@show')->name('notifications.show');
        Route::get('/leitura/{notify}', 'NotificationController@read')->name('notifications.read');
    });
    Route::get('/exports','TeamController@csv')->name('teams.export');

});
