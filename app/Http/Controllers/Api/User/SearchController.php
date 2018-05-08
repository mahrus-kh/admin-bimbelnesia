<?php

namespace App\Http\Controllers\Api\User;

use App\Model\TutoringAgency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function doSearch(Request $request)
    {
        $search = explode(' ', $request->search);

        $lembaga = TutoringAgency::select('slug','tutoring_agency','rating')
            ->where('tutoring_agency', 'REGEXP', implode('|', $search))
            ->get();


        if (count($lembaga) === 0){
            return response()->json(['msg' => 'Content Not Found'],204);
        }

        foreach ($lembaga as $row) {
            $row->total_comments = rand(52,137);
        }

        $response = [
            'msg' => 'Data Lembaga Hasil Pencarian',
            'lembaga' => $lembaga
        ];

        return response()->json($response,200);
    }
}
