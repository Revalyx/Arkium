<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Todas las rutas están pensadas para API-only (stateless)
| Versionadas desde el inicio.
*/

Route::prefix('v1')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Authentication
    |--------------------------------------------------------------------------
    */

    Route::prefix('auth')->group(function () {

        // Registro de usuario
        Route::post('/register', [AuthController::class, 'register']);

        // Login con rate limiting (protección fuerza bruta)
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

    Route::middleware('auth.api')->get('/me', function () {
        return auth()->user();
    });
});
