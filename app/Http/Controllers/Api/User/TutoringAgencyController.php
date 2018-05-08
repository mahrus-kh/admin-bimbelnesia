<?php

namespace App\Http\Controllers\Api\User;

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

        $tutoring_agency->category_id = $category_array;
        $tutoring_agency->sub_category_id = $sub_category_array;
        $tutoring_agency->total_views = $this->updateTotalViews($tutoring_agency->id, $tutoring_agency->total_views);
        $tutoring_agency->total_comments = rand(73,108);

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
        $tutoring_agency = TutoringAgency::select('slug','tutoring_agency','description','rating')
            ->orderBy('rating','DESC')
            ->orderBy('total_views', 'DESC')
            ->limit(4)
            ->get();

        foreach ($tutoring_agency as $row) {
            $row->description = str_limit($row->description, 160);
            $row->total_comments  = rand(23,143);
        }

        $response = [
            'msg' => 'Data Lembaga Populer',
            'lembaga' => $tutoring_agency
        ];

        return response()->json($response);
    }

    public function listAllLembaga()
    {
        $lembaga = TutoringAgency::select('slug','tutoring_agency','rating')
            ->orderBy('rating', 'DESC')
            ->get();

        foreach ($lembaga as $row) {
            $row->total_comments = rand(52,103);
        }

        $response = [
            'msg' => 'Data Semua Lembaga',
            'lembaga' => $lembaga
        ];

        return response()->json($response,200);
    }
}
