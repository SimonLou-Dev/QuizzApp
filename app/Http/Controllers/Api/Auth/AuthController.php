<?php

namespace App\Http\Controllers\Api\Auth;

use App\Function\DeviceDetection;
use App\Http\Controllers\Controller;
use App\Http\Request\LoginRequest;
use App\Http\Request\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class AuthController extends Controller
{

    public function register(RegisterRequest $request)
    {
        $user = new User();
        $user->email = $request->validated('email');
        $user->password = \Hash::make($request->validated('password'));
        $user->name = $request->validated('name');
        $user->save();
        $user = User::where('email', $request->validated('email'))->first();
        $token = $user->createToken(DeviceDetection::getDeviceName($request))->plainTextToken;


        return response()->json([
            'user'=>$user,
            'token'=>$token
        ], 201);

    }

    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->validated('email'))->first();
        if (!$user || !\Hash::check($request->validated('password'), $user->password)) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }

        $base = $user->unexpiredTokensForDevice('Unknown');
        if($base->count() > 0){
            $base->first()->delete();
        }

            $token = $user->createToken(DeviceDetection::getDeviceName($request))->plainTextToken;

        return response()->json([
            'user'=>$user,
            'token'=>$token
        ], 200);

    }

    public function user(Request $request){
        $user  = User::find($request->user()->id, 'id');
        return response()->json([
           'user'=>$user,
           'tokens'=>$user->unexpiredTokens()->get()
        ]);
    }

    public function logout(Request $request){
        $user = User::find($request->user()->id, 'id');
        $user->unexpiredTokensForDevice(DeviceDetection::getDeviceName($request))->delete();
        return response()->json([],204);
    }

    public function deleteUser(Request $request){
        $user = User::find($request->user()->id, 'id');
        $user->name =  fake()->name;
        $user->email = fake()->email;
        $user->password = \Hash::make(fake()->password);
        $user->role = 'deleted';
        $user->save();
        $user->tokens()->delete();
        $user->delete();

        return response()->json([
            'status'=>'Successful operation'
        ]);
    }


}
