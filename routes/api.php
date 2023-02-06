<?php

use App\Http\Controllers\Api\Timeline\TimeLineController;
use App\Http\Controllers\Api\Tweets\TweetController;
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
Route::get('/timeline', [TimeLineController::class, 'index']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/tweets', [TweetController::class, 'store']);
});
