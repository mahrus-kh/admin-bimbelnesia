<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Admin;
use App\User;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('pages.login-register.login');
    }

	public function postLogin(Request $request)
	{
		$this->validate($request,[
		    'email' => 'required|email|max:255',
            'password' => 'required|max:255',
        ]);

		if (auth()->attempt(['email' => $request->email, 'password' => $request->password])){
		    return redirect()->route('tutoring-agency.index');
        }

        return redirect()->back();
	}

    public function getRegister()
    {
        
	}

	public function postRegister()
	{
//		$bikin = User::create([
//			'name' => 'Khomaini User',
//			'email' => 'khomaini.khuser@gmail.com',
//			'password' => bcrypt('12345678')
//		]);
//
//		dd($bikin);

        dd(auth()->user());
	}

    public function getLogout()
    {
       auth()->logout();
       return redirect()->route('login');
	}
}
