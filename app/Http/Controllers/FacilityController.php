<?php

namespace App\Http\Controllers;

use App\Model\Facility;
use App\Model\TutoringAgency;
use Illuminate\Http\Request;

class FacilityController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, TutoringAgency $tutoring_agency)
    {
        Facility::create([
            'tutoring_agency_id' => $tutoring_agency->id,
            'facility' => $request->facility
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TutoringAgency $tutoring_agency, Facility $facility)
    {
        return view('pages.tutoring-agency.edit.edit-facility', compact('tutoring_agency','facility'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TutoringAgency $tutoring_agency, Facility $facility)
    {
        $facility->update([
            'facility' => $request->facility
        ]);

        return redirect()->route('tutoring-agency.edit-more', $tutoring_agency);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($tutoring_agency, Facility $facility)
    {
        $facility->delete();
        return redirect()->back();
    }
}
