<?php

namespace App\Http\Controllers;

use App\Model\StudyProgram;
use App\Model\TutoringAgency;
use Yajra\DataTables\DataTables;
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $tutoring_agency)
    {
        return StudyProgram::create([
            'tutoring_agency_id' => $tutoring_agency,
            'study_program' => $request->study_program,
            'cost' => $request->cost
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $study_program = StudyProgram::find($id);
        return response()->json($study_program);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudyProgram $study_program)
    {
        $study_program->update([
            'study_program' => $request->study_program,
            'cost' => $request->cost
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return StudyProgram::destroy($id);
    }

    public function datatablesLoad(TutoringAgency $tutoring_agency)
    {
        $study_program = $tutoring_agency->study_program()->get(['id', 'study_program', 'cost']);

        return DataTables::of($study_program)
            ->addcolumn('actions', function ($study_program) {
                return '
                <a onclick="edit_study_program(' . $study_program->id . ')" class="btn btn-info btn-xs" target="_blank"><i class="fa fa-pencil"></i></a>
                <a onclick="destroy_study_program(' . $study_program->id . ')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                ';
            })
            ->rawColumns(['actions'])
            ->make(true);

    }
}
