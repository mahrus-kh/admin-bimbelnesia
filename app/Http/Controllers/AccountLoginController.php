<?php

namespace App\Http\Controllers;

use App\Model\AccountLogin;
use Illuminate\Http\Request;

class AccountLoginController extends Controller
{
    public function update(Request $request, AccountLogin $account)
    {
        $account->update([
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->back();
    }
}
