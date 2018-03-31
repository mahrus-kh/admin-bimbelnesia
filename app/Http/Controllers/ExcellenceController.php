<?php

namespace App\Http\Controllers;

use App\Model\Excellence;
use App\Model\TutoringAgency;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ExcellenceController extends Controller
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
        return Excellence::create([
            'tutoring_agency_id' => $tutoring_agency,
            'excellence' => $request->excellence
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
        $excellence = Excellence::find($id);
        return response()->json($excellence);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Excellence $excellence)
    {
        $excellence->update([
            'excellence' => $request->excellence
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
        return Excellence::destroy($id);
    }

    public function datatablesLoad(TutoringAgency $tutoring_agency)
    {
        $excellence = $tutoring_agency->excellence()->get(['id', 'excellence']);

        return DataTables::of($excellence)
            ->addcolumn('actions', function ($excellence) {
                return '
                <a onclick="edit_excellence(' . $excellence->id . ')" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                <a onclick="destroy_excellence(' . $excellence->id . ')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                ';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
