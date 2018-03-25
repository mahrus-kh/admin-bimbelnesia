<?php

namespace App\Http\Controllers\Api\Lbb;

use App\Model\Category;
use App\Model\SubCategory;
use App\Model\TutoringAgency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TutoringAgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tutoring_agency = TutoringAgency::all(['tutoring_agency']);

        $token = "rahasia";

        $response = [
            'msg'   => 'Success',
            'data' => $tutoring_agency
        ];
        return response()->json($response, 200);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tutoring_agency = TutoringAgency::find($id);

        foreach ($tutoring_agency->category_id as $categories){
            $category = Category::find($categories, ['category']);
            $category_array [] = $category->category;
        }

        foreach ($tutoring_agency->sub_category_id as $sub_categories) {
            $sub_category = SubCategory::find($sub_categories, ['sub_category']);
            $sub_category_array [] = $sub_category->sub_category;
        }

        $tutoring_agency->category_id = $category_array;
        $tutoring_agency->sub_category_id = $sub_category_array;

        $response = [
            'msg'   => 'Data Tutoring Agency',
            'data'  => $tutoring_agency
        ];
        return response()->json($response, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tutoring_agency = TutoringAgency::find($id);

        $response = [
            'msg'   => 'Edit Data Tutoring Agency',
            'data'  => $tutoring_agency
        ];
        return response()->json($response, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tutoring_agency = TutoringAgency::find($id);
        $tutoring_agency->update([
//            'category_id' => $request->category_id,
//            'sub_category_id' => $request->sub_category_id,
            'slug' => str_slug($request->tutoring_agency),
            'tutoring_agency' => $request->tutoring_agency,
//            'logo_image' => $logo_image,
//            'address' => $request->address,
//            'description' => $request->description,
//            'tags' => explode(",", $request->tags),
//            'verified' => $request->verified,
        ]);

        $response = [
            'msg'   =>  'Data tutoring_agency Updated',
            'data'  =>  $tutoring_agency
        ];

        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
