<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Auth;

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
    return redirect()->route('question-one');
});

Route::get('/question-one', 'HomeController@questionOne')->name('question-one');
Route::post('/clearOutputNumberCache', 'HomeController@clearOutputNumberCache')->name('clear-output-number-cache');
Route::post('/question-one', 'HomeController@calculate')->name('calculate');
Route::get('/question-two', 'HomeController@questionTwo')->name('question-two');
Route::get('/user-interface', 'HomeController@userInterface')->name('user-interface');