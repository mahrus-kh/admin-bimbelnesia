<?php

namespace App\Http\Controllers\Api\User;

use App\Model\Category;
use App\Model\TutoringAgency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function listCategory()
    {
        $category = Category::select('id','slug','category')
            ->orderBy('category', 'ASC')
            ->get();

        $count_category = New TutoringAgency();

        foreach ($category as $row) {
            $row->count = count($count_category->showByCategory($row->id));
        }

        $response = [
            'msg' => 'Data Kategori',
            'list_category' => $category,
        ];

        return response()->json($response, 200);
    }

    public function showByCategory($slug)
    {
        $category_id = Category::select('id')->where('slug', $slug)->first();

        if (!$category_id) {
            return response()->json(['msg' => 'Content Not Found'],204);
        }

        $category = new TutoringAgency();
        $lembaga = $category->showByCategory($category_id->id);

        foreach ($lembaga as $row) {
            $tutoring_agency_id = TutoringAgency::find($row->id);
            $row->total_comments  = $tutoring_agency_id->feedback()->count();
        }

        $response = [
            'msg' => 'Data Lembaga By Category',
            'lembaga' => $lembaga
        ];

        return response()->json($response, 200);
    }
}
