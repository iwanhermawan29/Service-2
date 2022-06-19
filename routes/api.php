<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ArticleController;

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

Route::post('article', [ArticleController::class, 'store']);
Route::get('article', [ArticleController::class, 'index']);
// delete route
Route::delete('article/{id}', [ArticleController::class, 'delete']);
// get by status
Route::get('article/status/{status}', [ArticleController::class, 'status']);
// get by status2
Route::get('article/status2', [ArticleController::class, 'status2']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
