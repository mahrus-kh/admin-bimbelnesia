<?php

namespace App\Http\Controllers;

use App\Model\AccountLogin;
use App\Model\TutoringAgency;
use Illuminate\Http\Request;

class AccountLoginController extends Controller
{
    public function show(TutoringAgency $tutoring_agency)
    {
        foreach ($tutoring_agency->account_login()->get() as $account){
            $account = $account;
        }
        return response()->json($account);
    }

    public function update(Request $request, AccountLogin $account)
    {
        $account->update([
            'email' => $request->email_account,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->back();
    }
}
