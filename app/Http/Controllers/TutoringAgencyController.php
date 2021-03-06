<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\SubCategory;
use App\Model\Term;
use App\Model\TutoringAgency;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\PreProcessingController as PreProcessing;

class TutoringAgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.tutoring-agency.index');
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
        return view('pages.tutoring-agency.create', compact('category', 'sub_category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tutoring_agency = TutoringAgency::create([
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'slug' => str_slug($request->tutoring_agency),
            'tutoring_agency' => $request->tutoring_agency,
            'logo_image' => "upload/logo/default-logo.png",
            'address' => "foo",
            'description' => "foo",
            'tags' => [],
            'verified' => "0",
            'rating' => "4.5",
            'total_views' => 1,
        ]);

        $tutoring_agency->contact()->create();
        $tutoring_agency->accountLogin()->create([
            'name' => 'Administrator'
        ]);

        Term::create([
            'lbb_id' => $tutoring_agency->id,
            'term' => ''
        ]);

        return redirect()->route('tutoring-agency.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(TutoringAgency $tutoring_agency)
    {
        foreach ($tutoring_agency->category_id as $categories) {
            $category = Category::find($categories);
            $category_array [] = $category->category;
        }

        foreach ($tutoring_agency->sub_category_id as $sub_categories) {
            $sub_category = SubCategory::find($sub_categories);
            $sub_category_array [] = $sub_category->sub_category;
        }

        return view('pages.tutoring-agency.show', compact('tutoring_agency', 'category_array', 'sub_category_array'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TutoringAgency $tutoring_agency)
    {
        foreach ($tutoring_agency->category_id as $categories) {
            $category = Category::find($categories);
            $category_id [] = $category->id;
        }

        foreach ($tutoring_agency->sub_category_id as $sub_categories) {
            $sub_category = SubCategory::find($sub_categories);
            $sub_category_id [] = $sub_category->id;
        }

        $category = Category::all();
        $sub_category = SubCategory::all();
        return view('pages.tutoring-agency.edit', compact('tutoring_agency', 'category', 'sub_category', 'category_id', 'sub_category_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TutoringAgency $tutoring_agency)
    {
        $this->validate($request, [
            'tutoring_agency' => 'required|max:255',
            'logo_image' => 'image|mimes:jpeg,jpg,png|max:500',
            'address' => 'required|max:255',
            'description' => 'required|max:500',
            'tags' => 'max:255',
            'verified' => 'required'
        ]);

        $logo_image = $tutoring_agency->logo_image;
        if ($request->hasFile('logo_image')) {
            if ($tutoring_agency->logo_image != "upload/logo/default-logo.png") {
                unlink(public_path($tutoring_agency->logo_image));
            }
            $logo_image = 'upload/logo/' . str_slug($request->tutoring_agency) . '.' . $request->logo_image->getClientOriginalExtension();
            $request->logo_image->move(public_path('upload/logo/'), $logo_image);
        }

        $tutoring_agency->update([
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'slug' => str_slug($request->tutoring_agency),
            'tutoring_agency' => $request->tutoring_agency,
            'logo_image' => $logo_image,
            'address' => $request->address,
            'description' => $request->description,
            'tags' => explode(",", $request->tags),
            'verified' => $request->verified,
        ]);

        $this->createTerm($tutoring_agency->id);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TutoringAgency $tutoring_agency)
    {
        if ($tutoring_agency->logo_image != "upload/logo/default-logo.png") {
            unlink(public_path($tutoring_agency->logo_image));
        }
        $tutoring_agency->delete();
        return redirect()->back();
    }

    public function datatablesLoad()
    {
        $tutoring_agency = TutoringAgency::all(['id', 'tutoring_agency', 'verified']);

        return DataTables::of($tutoring_agency)
            ->addColumn('actions', function ($tutoring_agency) {
                return '
                <a href="' . route('tutoring-agency.show', $tutoring_agency) . '" class="btn btn-primary btn-xs" target="_blank"><i class="fa fa-external-link"></i></a>
                <a onclick="destroy(' . $tutoring_agency->id . ')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                ';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function tampilkan(TutoringAgency $tutoring_agency)
    {
        return view('tampilkan', compact('tutoring_agency'));
    }

    private function createTerm($tutoring_agency_id)
    {
        $term = TutoringAgency::select('description','tags')->where('id', $tutoring_agency_id)->first();
        $term = implode(' ', $term->tags) . " " . $term->description;

        $term = PreProcessing::stemming($term);

        return Term::where('lbb_id', $tutoring_agency_id)->update(['term' => $term]);
    }
}