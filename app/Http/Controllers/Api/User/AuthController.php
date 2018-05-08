<?php

namespace App\Http\Controllers\Api\User;

use App\Model\DataUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function doLogin(Request $request)
    {
        if (!auth('user')->attempt(['email' => $request->email, 'password' => $request->password])){
            return response()->json(['msg' => 'Email or password an incorrect !'], 204);
        }

        $response = [
            'msg' => 'Login Success',
            'user' => auth('user')->user()
        ];

        return response()->json($response,200);
    }

    public function doRegister(Request $request)
    {
        $check = DataUser::select('id')->where('email', $request->email)->get();

        if (count($check) > 0){
            return response()->json(['msg' => 'The email has already been taken'], 204);
        }

        $register = DataUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'status' => '1',
            'api_token' => bcrypt($request->email)
        ]);

        $response = [
            'status' => $register
        ];

        return response()->json($response, 200);
    }

    public function doResetPassword()
    {
        
    }
}
