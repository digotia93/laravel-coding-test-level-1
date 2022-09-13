<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix'=>'v1/events'], function($router){
    $router->get('/', [EventController::class, 'index'])->name('events.index');
    $router->get('/active-events', [EventController::class, 'activeEvents'])->name('events.active-events');
    $router->get('/{id}', [EventController::class, 'show'])->name('events.show');
    $router->post('/', [EventController::class, 'create'])->name('events.create');
    $router->match(['put', 'patch'], '/{id}', [EventController::class, 'update'])->name('events.update');
    $router->delete('/{id}', [EventController::class, 'delete'])->name('evetns.destroy');
});
