<?php

namespace App\Http\Controllers\Api\User;

use App\Model\Rating;
use App\Model\TutoringAgency;
use App\Model\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeedbackController extends Controller
{
    public function doFeedback(Request $request, $slug)
    {
        $check = Rating::select('id')->where('data_user_id', $request->user_id)->first();
        if (count($check) > 0){
            return response()->json(['msg' => 'Sudah Memberika Feedback Sebelumnya'], 204);
        }

        $tutoring_agency = TutoringAgency::select('id')->where('slug', $slug)->first();

        $tutoring_agency->rating()->create([
            'data_user_id' => $request->user_id,
            'rating' => $request->rating
        ]);

        $tutoring_agency->comment()->create([
            'data_user_id' => $request->user_id,
            'comment' => $request->comment
        ]);


        return response()->json(['msg' => 'Feedback Berhasil'], 200);
    }

    public function showFeedbackLembaga($slug)
    {

    }
}
