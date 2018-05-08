<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\TutoringAgency;

class DirectoryController extends Controller
{
    public function showByCategory($slug)
    {
        return $slug;
    }

    public function showAlphabetDirectory()
    {
        $tutoring_agency = New TutoringAgency();
        $alphabet_directory = $tutoring_agency->showAlphabetDirectory();
        $lembaga = $tutoring_agency->showDirectoryByAlphabet();
        $response = [
            'msg' => 'Data Alfabet Direktori',
            'alphabet_directory' => $alphabet_directory,
            'lembaga_by_alphabet' => $lembaga
        ];
        return response()->json($response, 200);
    }

    public function showDirectoryByOneAlphabet($alphabet)
    {
        $tutoring_agency = New TutoringAgency();
        $alphabet_directory = $tutoring_agency->showAlphabetDirectory();
        $lembaga = $tutoring_agency->showDirectoryByOneAlphabet($alphabet);

        if (count($lembaga) === 0){
            return response()->json(['msg' => 'Content Not Found'],204);
        }

        $response = [
            'msg' => 'Data Direktori By Alfabet',
            'alphabet_directory' => $alphabet_directory,
            'lembaga_by_alphabet' => $lembaga
        ];
        return response()->json($response, 200);
    }
}
