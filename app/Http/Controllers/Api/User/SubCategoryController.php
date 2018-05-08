<?php

namespace App\Http\Controllers\Api\User;

use App\Model\SubCategory;
use App\Model\TutoringAgency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubCategoryController extends Controller
{
    public function listSubCategory()
    {
        $sub_category = SubCategory::select('id','slug', 'sub_category','fa_icon')
            ->orderBy('sub_category', 'ASC')
            ->get();

        $count_sub_category = New TutoringAgency();

        foreach ($sub_category as $row){
            $row->count = count($count_sub_category->showBySubCategory($row->id));
            $row->color = array_random(['text-primary','text-success','text-warning','text-danger']);
        }

        $response = [
            'msg' => 'Data Sub Kategori',
            'list_sub_category' => $sub_category
        ];

        return response()->json($response, 200);
    }

    public function showBySubCategory($slug)
    {
        $sub_category_id = SubCategory::select('id')->where('slug', $slug)->first();

        if (!$sub_category_id) {
            return response()->json(['msg' => 'Content Not Found'],204);
        }

        $sub_category = new TutoringAgency();
        $lembaga = $sub_category->showBySubCategory($sub_category_id->id);

        foreach ($lembaga as $row) {
            $row->total_comments = rand(52,103);
        }

        $response = [
            'msg' => 'Data Lembaga By Category',
            'lembaga' => $lembaga
        ];

        return response()->json($response, 200);
    }
}