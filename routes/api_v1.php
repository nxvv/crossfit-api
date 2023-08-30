<?php

// use App\Http\Controllers\TestController;
use App\Http\Controllers\WorkoutController;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::get('/', [TestController::class, 'index']);

Route::prefix('workouts')->group(function () {

    Route::get('/', [WorkoutController::class, 'index']);
    Route::get('/{workout}', [WorkoutController::class, 'show']);
    Route::post('/', [WorkoutController::class, 'create']);
    Route::patch('/{workout}', [WorkoutController::class, 'update']);
    Route::delete('/{workout}', [WorkoutController::class, 'delete']);

});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
