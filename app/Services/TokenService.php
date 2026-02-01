<?php

namespace App\Services;

use App\Models\ApiToken;
use Illuminate\Support\Str; // 🔥 ESTA LÍNEA ES CLAVE

class TokenService
{
    public static function createToken(int $userId, ?string $name = null): string
    {
        $plainToken = Str::random(40);
        $hashedToken = hash('sha256', $plainToken);

        ApiToken::create([
            'user_id' => $userId,
            'token' => $hashedToken,
            'name' => $name,
            'expires_at' => now()->addDays(30),
        ]);

        return $plainToken;
    }
}
