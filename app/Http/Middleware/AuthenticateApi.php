<?php

namespace App\Http\Middleware;

use App\Models\ApiToken;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateApi
{
    public function handle(Request $request, Closure $next): Response
    {
        $header = $request->header('Authorization');

        // 1️⃣ Comprobar que el header existe y es Bearer
        if (!$header || !str_starts_with($header, 'Bearer ')) {
            return response()->json([
                'error' => [
                    'code' => 'UNAUTHENTICATED',
                    'message' => 'Token no proporcionado',
                ],
            ], 401);
        }

        // 2️⃣ Extraer token en claro
        $plainToken = trim(substr($header, 7));

        if ($plainToken === '') {
            return response()->json([
                'error' => [
                    'code' => 'UNAUTHENTICATED',
                    'message' => 'Token vacío',
                ],
            ], 401);
        }

        // 3️⃣ Hashear token (igual que al guardarlo)
        $hashedToken = hash('sha256', $plainToken);

        // 4️⃣ Buscar token en BD
        $apiToken = ApiToken::where('token', $hashedToken)->first();

        // 5️⃣ Validaciones defensivas
        if (
            !$apiToken ||
            !$apiToken->user ||
            ($apiToken->expires_at && $apiToken->expires_at->isPast())
        ) {
            return response()->json([
                'error' => [
                    'code' => 'UNAUTHENTICATED',
                    'message' => 'Token inválido o expirado',
                ],
            ], 401);
        }

        // 6️⃣ (Opcional) marcar último uso
        // $apiToken->update(['last_used_at' => now()]);

        // 7️⃣ Inyectar usuario autenticado en el contexto
        Auth::setUser($apiToken->user);

        return $next($request);
    }
}
