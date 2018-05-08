<?php

namespace App\Http\Controllers;

use App\Model\TutoringAgency;
use Illuminate\Http\Request;
use App\Model\Admin;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('pages.login-register.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required|max:255',
        ]);

        if (auth('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
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

        dd(auth('admin')->user());
    }

    public function getLogout()
    {
        auth('admin')->logout();
        return redirect()->route('login');
    }
}
