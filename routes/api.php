<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['jwt.verify'])->group(function () {

    Route::get('/books', [ApiController::class, 'allBooks']); //http://127.0.0.1:8000/api/books
    Route::get('/allCategories', [ApiController::class, 'allCategories']);
    Route::post('/createCategory', [ApiController::class, 'createCategory']);
    Route::put('/updateCategory/{id}', [apiController::class, 'updateCategory']);
    Route::delete('/deleteCategory/{id}', [apiController::class, 'deleteCategory']);
    Route::get('/showCategory/{id}', [apiController::class, 'showCategory']);
});
//authen who are you
//authro what can you do
//jwt
// composer require tymon/jwt-auth

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});
