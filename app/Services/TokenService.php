<?php

namespace App\Services;

use App\Models\ApiToken;
use Illuminate\Support\Str;

class TokenService
{
    /**
     * Crea un token API seguro y hasheado
     *
     * - El token plano SOLO se devuelve al cliente
     * - En BD se guarda únicamente el hash
     */
    public static function createToken(int $userId, ?string $name = null): string
    {
        // Token plano (cliente)
        $plainToken = Str::random(40);

        // Token hasheado (BD)
        $hashedToken = hash('sha256', $plainToken);

        ApiToken::create([
            'user_id'    => $userId,
            'token'      => $hashedToken,
            'name'       => $name,
            'expires_at' => now()->addDays(30), // expiración controlada
        ]);

        return $plainToken;
    }

    /**
     * (Opcional futuro)
     * Revocar tokens antiguos / limitar sesiones
     */
}
