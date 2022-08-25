<?php

namespace App\Http\Middleware;

use App\Models\PersonalAccessToken;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class GuestSanctumMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $bearer = $request->bearerToken();
        if($token = PersonalAccessToken::where('token', hash('sha256',$bearer))->first())
        {
            if($user = User::where('id', $token->tokenable_id)->first())
            {
                \Auth::login($user);
                return response()->json([
                    'error'=> 'Access denied'
                ], 403);
            }
        }

        return $next($request);
    }
}
