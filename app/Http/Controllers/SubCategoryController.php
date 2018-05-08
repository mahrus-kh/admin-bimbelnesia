<?php

namespace App\Http\Controllers;

use App\Model\SubCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SubCategoryController extends Controller
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
        return SubCategory::create([
            'slug' => str_slug($request->sub_category),
            'sub_category' => $request->sub_category,
            'fa_icon' => $request->fa_icon
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
        $sub_category = SubCategory::find($id);
        return response()->json($sub_category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $sub_category)
    {
        $sub_category->update([
            'slug' => str_slug($request->sub_category),
            'sub_category' => $request->sub_category,
            'fa_icon' => $request->fa_icon
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
        return SubCategory::destroy($id);
    }

    public function datatablesLoad()
    {
        $sub_category = SubCategory::all(['id', 'sub_category','fa_icon']);

        return DataTables::of($sub_category)
            ->addColumn('actions', function ($sub_category) {
                return '
                <a onclick="edit_sub_category(' . $sub_category->id . ')" class="btn btn-info btn-xs" target="_blank"><i class="fa fa-pencil"></i></a>
                <a onclick="destroy_sub_category(' . $sub_category->id . ')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                ';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
