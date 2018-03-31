<?php

namespace App\Http\Controllers\Api\Lbb;

use App\Model\TutoringAgency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PelayananLembagaController extends Controller
{
    public function show(TutoringAgency $tutoring_agency)
    {

        $response = [
            'excellence' => $tutoring_agency->excellence()->get(['id','excellence']),
            'facility' => $tutoring_agency->facility()->get(['id','facility']),
            'study_program' => $tutoring_agency->study_program()->get(['id','study_program'])
        ];

        return response()->json($response);
    }
}
