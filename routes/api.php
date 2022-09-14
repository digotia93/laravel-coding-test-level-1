<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EventController;

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
    $router->get('/', [EventController::class, 'index'])->name('api.events.index');
    $router->post('/', [EventController::class, 'create'])->name('api.events.create');
    $router->get('/active-events', [EventController::class, 'activeEvents'])->name('api.events.active-events');
    $router->get('/{id}', [EventController::class, 'show'])->name('api.events.show');
    $router->match(['put', 'patch'], '/{id}', [EventController::class, 'update'])->name('api.events.update');
    $router->delete('/{id}', [EventController::class, 'destroy'])->name('api.events.destroy');
});
