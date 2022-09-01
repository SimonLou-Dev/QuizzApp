<?php

namespace Tests;

use App\Models\User;

class TestUtils
{

    public static function getAuthHeader(User $user = null): array
    {
        return ['Authorization' => 'Bearer ' . self::getToken($user)];
    }

    public static function getToken(User $user = null): string
    {
        if($user == null){
            $user = User::factory()->create();
            $user = User::where('email', $user->email)->first();
        }

        $token = explode('|', $user->createToken('Testing')->plainTextToken);
        return $token[1];
    }

}
