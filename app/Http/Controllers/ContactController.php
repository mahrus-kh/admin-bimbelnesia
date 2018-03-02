<?php

namespace App\Http\Controllers;

use App\Model\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function update(Request $request, Contact $contact)
    {
        $contact->update([
            'website' => $request->website,
            'office_phone' => $request->office_phone,
            'mobile_phone' => $request->mobile_phone,
            'email' => $request->email,
            'other_contacts' => $request->other_contacts,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
        ]);

        return redirect()->back();
    }
}
