<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService
{
    /**
     * Registro de usuario
     */
    public function register(array $data): array
    {
        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $token = TokenService::createToken($user->id, 'default');

        return [
            'user'  => $user,
            'token' => $token,
        ];
    }

    /**
     * Login de usuario
     */
    public function login(array $data): array
    {
        $user = User::where('email', $data['email'])->first();

        // Mensaje genérico: no filtramos si el email existe
        if (!$user || !Hash::check($data['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Credenciales inválidas.'],
            ]);
        }

        $token = TokenService::createToken($user->id, 'default');

        return [
            'user'  => $user,
            'token' => $token,
        ];
    }

    /**
     * Logout (revoca todos los tokens del usuario)
     */
    public function logout(User $user): void
    {
        $user->apiTokens()->delete();
    }
}
