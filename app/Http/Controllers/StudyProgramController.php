<?php

namespace App\Http\Controllers;

use App\Model\StudyProgram;
use App\Model\TutoringAgency;
use Illuminate\Http\Request;

class StudyProgramController extends Controller
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
        StudyProgram::create([
            'tutoring_agency_id' => $tutoring_agency->id,
            'study_program' => $request->study_program,
            'cost' => $request->cost
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
    public function edit(TutoringAgency $tutoring_agency, StudyProgram $study_program)
    {
        return view('pages.tutoring-agency.edit.edit-study-program', compact('tutoring_agency','study_program'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TutoringAgency $tutoring_agency, StudyProgram $study_program)
    {
        $study_program->update([
            'study_program' => $request->study_program,
            'cost' => $request->cost
        ]);

        return redirect()->route('tutoring-agency.edit-more', $tutoring_agency);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($tutoring_agency, StudyProgram $study_program)
    {
        $study_program->delete();
        return redirect()->back();
    }
}
