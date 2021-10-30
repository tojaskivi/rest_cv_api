<?php

use App\Http\Controllers\CoursesController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\WebsitesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Controller;
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

// COURSES
Route::GET('/courses', [CoursesController::class, 'index']);
Route::GET('/courses/{id}', [CoursesController::class, 'show']);

// JOBS
Route::GET('/jobs', [JobsController::class, 'index']);
Route::GET('/jobs/{id}', [JobsController::class, 'show']);

// WEBSITES
Route::GET('/websites', [WebsitesController::class, 'index']);
Route::GET('/websites/{id}', [WebsitesController::class, 'show']);

// META
// Hidden for now
// Route::POST('/register', [UserController::class, 'register']);
Route::POST('/login', [UserController::class, 'login']);
Route::GET('/search/{searchTerm}', [Controller::class, 'search']);

// TESTS
// Route::POST('/test', [UserController::class, 'testRequest']);

// PROTECTED ENDPOINTS - Requires authorization
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::POST('/courses', [CoursesController::class, 'store']);
    Route::DELETE('/courses/{id}', [CoursesController::class, 'destroy']);
    Route::PUT('/courses/{id}', [CoursesController::class, 'update']);

    Route::POST('/jobs', [JobsController::class, 'store']);
    Route::DELETE('/jobs/{id}', [JobsController::class, 'destroy']);
    Route::PUT('/jobs/{id}', [JobsController::class, 'update']);

    Route::POST('/websites', [WebsitesController::class, 'store']);
    Route::DELETE('/websites/{id}', [WebsitesController::class, 'destroy']);
    Route::PUT('/websites/{id}', [WebsitesController::class, 'update']);

    Route::POST('/logout', [UserController::class, 'logout']);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
