<?php

namespace App\Http\Controllers\Api\Lbb;

use App\Model\Contact;
use App\Model\TutoringAgency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($token)
    {
        $tutoring_agency = TutoringAgency::find(JWTAuth::authenticate($token)->tutoring_agency_id);
        foreach ($tutoring_agency->contact()->get() as $contacts) {
            $contact = $contacts;
        }

        return response()->json($contact, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
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

        return response()->json(['msg' => 'Berhasil Update Kontak'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
