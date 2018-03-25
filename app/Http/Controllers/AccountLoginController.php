<?php

namespace App\Http\Controllers;

use App\Model\AccountLogin;
use App\Model\TutoringAgency;
use Illuminate\Http\Request;

class AccountLoginController extends Controller
{
    public function show(TutoringAgency $tutoring_agency)
    {
        $account_login = [
            'id' => $tutoring_agency->accountLogin->id,
            'email' => $tutoring_agency->accountLogin->email
        ];
        return response()->json($account_login);
    }

    public function update(Request $request, AccountLogin $account)
    {
        $account->update([
            'email' => $request->email_account,
            'password' => bcrypt($request->password)
        ]);
    }
}