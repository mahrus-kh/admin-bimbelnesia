<?php

namespace App\Http\Controllers;

use App\Model\AccountLogin;
use App\Model\Category;
use App\Model\Contact;
use App\Model\SubCategory;
use App\Model\TutoringAgency;
use Illuminate\Http\Request;

class TutoringAgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tutoring_agency = TutoringAgency::all();
        return view('pages.tutoring-agency.index', compact('tutoring_agency'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $sub_category = SubCategory::all();
        return view('pages.tutoring-agency.create', compact('category','sub_category'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tutoring_agency = TutoringAgency::create([
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'slug' => str_slug($request->tutoring_agency),
            'tutoring_agency' => $request->tutoring_agency,
            'address' => "foo",
            'description' => "foo",
            'tags' => [],
            'verified' => '0',
            'rating' => '4.5',
            'total_views' => 1,
        ]);

        Contact::create([
            'tutoring_agency_id' => $tutoring_agency->id
        ]);

        AccountLogin::create([
            'tutoring_agency_id' => $tutoring_agency->id
        ]);

        return redirect()->route('tutoring-agency.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TutoringAgency $tutoring_agency)
    {
        foreach ($tutoring_agency->category_id as $categories){
            $category = Category::find($categories);
            $category_array [] = $category->category;
        }

        foreach ($tutoring_agency->sub_category_id as $sub_categories){
            $sub_category = SubCategory::find($sub_categories);
            $sub_category_array [] = $sub_category->sub_category;
        }

        return view('pages.tutoring-agency.detail',compact('tutoring_agency','category_array','sub_category_array'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TutoringAgency $tutoring_agency)
    {
        foreach ($tutoring_agency->category_id as $categories){
            $category = Category::find($categories);
            $category_id [] = $category->id;
        }

        foreach ($tutoring_agency->sub_category_id as $sub_categories){
            $sub_category = SubCategory::find($sub_categories);
            $sub_category_id [] = $sub_category->id;
        }

        $category = Category::all();
        $sub_category = SubCategory::all();
        return view('pages.tutoring-agency.edit-tutoring-agency-contact', compact('tutoring_agency','category','sub_category','category_id','sub_category_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TutoringAgency $tutoring_agency)
    {
        $tutoring_agency->update([
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'slug' => str_slug($request->tutoring_agency),
            'tutoring_agency' => $request->tutoring_agency,
            'address' => $request->address,
            'description' => $request->description,
            'tags' => explode(",", $request->tags),
            'verified' => $request->verified,
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TutoringAgency $tutoring_agency)
    {
        $tutoring_agency->delete();
        return redirect()->back();
    }

    public function edit_more(TutoringAgency $tutoring_agency)
    {
        return view('pages.tutoring-agency.edit-excellence-facility-study-program', compact('tutoring_agency'));
    }
}
