<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Admin;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.data-admin.index');
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
        return Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt("foo1234")
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
        $admin = Admin::find($id);
        return response()->json($admin);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        $admin->update([
            'name' => $request->name,
            'email' => $request->email
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
        return Admin::destroy($id);
    }

    public function settingAccount(Request $request, Admin $admin)
    {
        $admin->update([
            'name' => $request->name_account,
            'email' => $request->email_account,
            'password' => bcrypt($request->password_account)
        ]);
    }

    public function datatablesLoad()
    {
        $admin = Admin::all(['id', 'name', 'email']);

        return DataTables::of($admin)
            ->addColumn('actions', function ($admin) {
                return '
                <a onclick="edit_admin(' . $admin->id . ')" class="btn btn-info btn-xs" target="_blank"><i class="fa fa-pencil"></i></a>
                <a onclick="destroy_admin(' . $admin->id . ')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                ';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
