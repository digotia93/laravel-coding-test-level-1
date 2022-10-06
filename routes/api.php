<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HomeController;
// use App\Http\Controllers\Api\EventController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/calculate', [HomeController::class, 'calculate'])->name('api.calculate');
Route::post('/question-two', 'HomeController@questionTwo')->name('api.question-two');
Route::get('/mysocialnetwork/user/{userid}/friends', 'HomeController@getFriends')->name('api.get-friends');
Route::get('/mysocialnetwork/user/{userid}/movies', 'HomeController@getWatchedMovies')->name('api.get-watched-movies');
Route::get('/mysocialnetwork/user/{userid}/recommended-movies', 'HomeController@getRecommendedMovies')->name('api.get-recommended-movies');