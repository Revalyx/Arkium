<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| API stateless, versionada desde el inicio.
| Toda la autenticación se basa en tokens propios.
*/

Route::prefix('v1')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Authentication
    |--------------------------------------------------------------------------
    */

    Route::prefix('auth')->group(function () {

        // Registro de usuario (rate limit contra spam)
        Route::post('/register', [AuthController::class, 'register'])
            ->middleware('throttle:5,1'); // 5 registros por minuto

        // Login (protección contra fuerza bruta)
        Route::post('/login', [AuthController::class, 'login'])
            ->middleware('throttle:5,1'); // 5 intentos por minuto

        // Logout (requiere autenticación)
        Route::post('/logout', [AuthController::class, 'logout'])
            ->middleware('auth.api');

        // (Preparado para Google OAuth)
        // Route::post('/google', [AuthController::class, 'google']);
    });

    /*
    |--------------------------------------------------------------------------
    | Authenticated user
    |--------------------------------------------------------------------------
    */

    Route::middleware('auth.api')->group(function () {

        Route::get('/me', function () {
            return response()->json(auth()->user());
        });

        // Aquí irán en el futuro:
        // - items
        // - reviews
        // - ratings
    });
});
