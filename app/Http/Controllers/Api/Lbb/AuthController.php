<?php

namespace App\Http\Controllers\Api\Lbb;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function register(){

    }

    public function login()
    {
        $credentials = [
            'email' => 'mahrus.khomaini@gmail.com',
            'password' => '21200786'
        ];

        $token = null;
//            try{
//                if (!$token = JWTAuth::attempt($credentials)){
//                    return response()->json([
//                        'msg' => 'Email or password are incorrect'
//                    ], 404);
//                }
//            } catch (JWTException $e){
//                return response()->json([
//                    'msg' => 'failed_to_crate_token'
//                ], 404);
//            }
        $token = JWTAuth::attempt($credentials);
        $response = [
            'msg' => 'User Login',
            'user' => $credentials,
            'token' => $token
        ];

        return response()->json($response);
    }
}
