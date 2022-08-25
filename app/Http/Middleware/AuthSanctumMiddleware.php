<?php

namespace App\Http\Middleware;

use App\Models\PersonalAccessToken;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class AuthSanctumMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $bearer = $request->bearerToken();
        if($token = PersonalAccessToken::where('token', hash('sha256',$bearer))->first())
        {

            if($user = User::find($token->tokenable_id, 'id'))
            {
                \Auth::login($user);
                return $next($request);
            }

        }
        return response()->json([
            'error'=> 'Access denied'
        ], 403);

    }
}
