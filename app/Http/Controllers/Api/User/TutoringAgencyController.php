<?php

namespace App\Http\Controllers\Api\User;

use App\Model\Rating;
use App\Model\TutoringAgency;
use App\Model\Category;
use App\Model\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TutoringAgencyController extends Controller
{
    public function show($slug)
    {
        $tutoring_agency = TutoringAgency::with(['contact','excellence','facility','study_program'])
            ->where('slug', $slug)
            ->first();

        if (!$tutoring_agency) {
            return response()->json(['msg' => 'Content Not Found'],204);
        }

        foreach ($tutoring_agency->category_id as $categories) {
            $category = Category::find($categories, ['category']);
            $category_array [] = $category->category;
        }

        foreach ($tutoring_agency->sub_category_id as $sub_categories) {
            $sub_category = SubCategory::find($sub_categories, ['sub_category']);
            $sub_category_array [] = $sub_category->sub_category;
        }

        foreach ($tutoring_agency->feedback as $feedback){
            $data_user = Rating::find($feedback->id);
            $feedback->name_user = $data_user->dataUser->name;
        }

        $tutoring_agency->category_id = $category_array;
        $tutoring_agency->sub_category_id = $sub_category_array;
        $tutoring_agency->total_views = $this->updateTotalViews($tutoring_agency->id, $tutoring_agency->total_views);
        $tutoring_agency->total_comments = $tutoring_agency->feedback()->count();

        $response = [
            'msg' => 'Data Lembaga',
            'lembaga' => $tutoring_agency,
        ];

        return response()->json($response,200);
    }

    public function updateTotalViews($id, $total_views)
    {
        $tutoring_agency = TutoringAgency::find($id);
        $tutoring_agency->update([
            'total_views' => $total_views + 1
        ]);

        return $total_views + 1;
    }

    public function showPopularLembaga()
    {
        $tutoring_agency = TutoringAgency::select('id','slug','tutoring_agency','description','rating')
            ->orderBy('rating','DESC')
            ->orderBy('total_views', 'DESC')
            ->limit(4)
            ->get();

        foreach ($tutoring_agency as $row) {
            $row->description = str_limit($row->description, 160);
            $tutoring_agency_id = TutoringAgency::find($row->id);
            $row->total_comments  = $tutoring_agency_id->feedback()->count();
        }

        $response = [
            'msg' => 'Data Lembaga Populer',
            'lembaga' => $tutoring_agency
        ];

        return response()->json($response);
    }

    public function listAllLembaga()
    {
        $lembaga = TutoringAgency::select('id','slug','tutoring_agency','rating')
            ->orderBy('rating', 'DESC')
            ->get();

        foreach ($lembaga as $row) {
            $tutoring_agency_id = TutoringAgency::find($row->id);
            $row->total_comments  = $tutoring_agency_id->feedback()->count();
        }

        $response = [
            'msg' => 'Data Semua Lembaga',
            'lembaga' => $lembaga
        ];

        return response()->json($response,200);
    }
}
