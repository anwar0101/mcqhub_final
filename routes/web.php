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

Route::get('/', function () {
    $categories = \App\Category::all();
    return view('welcome', compact('categories'));
});

Route::get('/sub/{id}', function ($id) {
    $category = \App\Category::find($id);
    $subjects = $category->subjects;
    return view('exam.select_subject', compact('subjects'));
})->name('select.subjects');

Route::get('/prac/{id}', function ($id) {
    $subject = \App\Subject::find($id);
    $questions = $subject->questions;
    return view('exam.practise.question_paper', compact('questions'));
})->name('start.practise');

Route::get('/model/{id}', function ($id) {
    $subject = \App\Subject::find($id);
    $questions = $subject->questions;
    return view('exam.model.question_paper', compact('questions','subject'));
})->name('start.model');

Route::get('/contest/{id}', function ($id) {
    $subject = \App\Subject::find($id);
    $questions = $subject->questions;
    return view('exam.model.question_paper', compact('questions','subject'));
})->name('start.model');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group( ['middleware' => ['auth']], function() {

    Route::get('answers/practise/{id}/{user_answer}', 'AnswerController@userAnswer');
    Route::get('mocks/test/{id}/{user_answer}', 'MockTestController@userAnswer');
    Route::get('contests/test/{id}/{user_answer}', 'ContestController@userAnswer');

    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');
    Route::resource('posts', 'PostController');
    Route::resource('categories', 'CategoryController');
    Route::resource('subjects', 'SubjectController');
    Route::resource('questions', 'QuestionController');
    Route::resource('answers', 'AnswerController');
    Route::resource('mocks', 'MockTestController');
    Route::resource('contests', 'ContestController');
    Route::resource('asks', 'AskController');
    Route::resource('askreply', 'AskReplyController');
});
