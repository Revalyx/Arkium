<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\AuthenticationException;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * The list of inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Render an exception into an HTTP response.
     */
    public function render($request, Throwable $e)
    {
        // --- VALIDACIÓN (422) ---
        if ($e instanceof ValidationException) {
            return response()->json([
                'error' => [
                    'code' => 'VALIDATION_ERROR',
                    'message' => 'Los datos enviados no son válidos',
                    'details' => $e->errors(),
                ],
            ], 422);
        }

        // --- NO AUTENTICADO (401) ---
        if ($e instanceof AuthenticationException) {
            return response()->json([
                'error' => [
                    'code' => 'UNAUTHENTICATED',
                    'message' => 'No autenticado o token inválido',
                ],
            ], 401);
        }

        // --- ERRORES HTTP CONTROLADOS (403, 404, etc.) ---
        if ($e instanceof HttpExceptionInterface) {
            return response()->json([
                'error' => [
                    'code' => 'HTTP_ERROR',
                    'message' => $e->getMessage() ?: 'Error en la petición',
                ],
            ], $e->getStatusCode());
        }

        // --- ERROR INTERNO (500) ---
        return response()->json([
            'error' => [
                'code' => 'INTERNAL_ERROR',
                'message' => app()->isProduction()
                    ? 'Error interno del servidor'
                    : $e->getMessage(),
            ],
        ], 500);
    }
}
