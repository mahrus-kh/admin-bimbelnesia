<?php

namespace App\Http\Controllers\Api\Lbb;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register()
    {

    }

    public function login(Request $request)
    {
//        Config::set('jwt.user', 'App\Model\AccountLogin');
//        Config::set('auth.providers.users.model', \App\Model\AccountLogin::class);

//        $this->validate($request, [
//            'email' => 'required|email|min:5|max:255',
//            'password' => 'required|min:8|max:255'
//        ]);
//        $request->email = "khomaini.kh@gmail.com";
//        $request->password = "foo12345";

//        $request->email = "bimbelforumgurulogin@gmail.com";
//        $request->password = "12345678";

        try {
            if (!$token = JWTAuth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return response()->json([
                    'msg' => 'Email or password are incorrect',
                ],  401);
            }
        } catch (JWTException $e) {
            return response()->json([
                'msg' => 'Failed to create token',
            ], 401);
        }

        $response = [
            'msg' => 'Login Success',
            'id' => JWTAuth::authenticate($token)->id,
            'token' => $token

        ];

        return response()->json($response, 200);
    }

    public function mainkan (Request $request)
    {
//        $siapa = auth()->user();
//        return response()->json(['msg' => "IKA YUNI KOMARIYAH", 'siapa' => $siapa, 're' => $request->token], 200);
//        $token = apache_request_headers('');
//        try {
//            if (!$token = JWTAuth::attempt(['email' => "mahrus.khomaini@gmail.com", 'password' => "21200786"])) {
//                return response()->json([
//                    'msg' => 'Email or password are incorrect',
//                ], 200);
//            }
//        } catch (JWTException $e) {
//            return response()->json([
//                'msg' => 'Failed to create token',
//            ], 200);
//        }


        return view('mainkan');
    }

    public function bermain(Request $request)
    {
        $response = [
            'msg' => 'IKA Yuni',
            'usernya' => auth()->user()
        ];

        return response()->json($response);
    }
}