<?php

use App\Http\Controllers\ApiDataTicketsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

Route::get('/get/tickets', [ApiDataTicketsController::class, 'get_tickets']);
Route::post('/add/tickets', [ApiDataTicketsController::class, 'store']);
Route::get('/edit/tickets', [ApiDataTicketsController::class, 'edit']);
Route::post('/update/tickets', [ApiDataTicketsController::class, 'update']);
Route::delete('/delete/ticket/{id}', [ApiDataTicketsController::class, 'destroy']);