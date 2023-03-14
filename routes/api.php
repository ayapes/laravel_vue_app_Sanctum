<?php

use Illuminate\Http\Request;
// use App\Http\Controllers\Api\MeController;
use Illuminate\Support\Facades\Route;

// Laravel8から使うコントローラのuseが必要
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoanController;

// Laravel8から書き方が変更された
// apiに対応したrestfulにしておく

Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Auth\LogoutController::class, 'logout']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => ['auth:sanctum']], function () {
    // Route::get('/me', MeController::class);

    Route::get('/books/getRakutenAPI', [BookController::class, 'getRakutenAPI']);

    Route::apiResource('/books', BookController::class);

    Route::apiResource('/loans', LoanController::class);

    Route::post('/books/search', [BookController::class, 'search']);

    Route::apiResource('/users', UserController::class);
});
