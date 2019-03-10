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

use App\User;
use App\Question;
use App\Answer;
use App\Services\ResultService;

Route::get('/', function () {

    $questions = Question::all();
    $answers = Answer::all();

    return view('home',  [
        'questions' => $questions,
        'answers' => $answers
    ]);
});

Route::post('/', function() {
    $resultService = new ResultService();
    $amountOfQuestions = Question::count();


    $answers = Array();
    for($i = 1; $i <= $amountOfQuestions; $i++) {
        $answers[$i] = Array(request('v'.$i), request('b'.$i));
    }

    $result = $resultService->calculateResult($answers);

    return view('result', ['result' => $result]);

});

Route::get('/more', function () {
    return view('more');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/admin', function () {
    return view('admin');
});