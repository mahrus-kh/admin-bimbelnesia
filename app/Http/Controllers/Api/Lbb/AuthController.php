<?php

namespace App\Http\Controllers\Api\Lbb;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register()
    {

    }

    public function login(Request $request)
    {
        try{
            if (!$token = JWTAuth::attempt(['email' => $request->email, 'password' => $request->password])){
                return response()->json([
                    'msg' => 'Email or password are incorrect',
                ],  404);
            }
        } catch (JWTException $e){
            return response()->json([
                'msg' => 'Failed to create token',
            ], 404);
        }

        $response = [
            'msg' => 'Login Success',
            'token' => $token
        ];

        return response()->json($response, 200);
    }

    public function belajar()
    {
        $credentials = [
            'email' => "khomaini.kh@gmail.com",
            'password' => "foo1234"
        ];

        $halo = JWTAuth::parseToken();

        return response()->json($halo);
    }
}
