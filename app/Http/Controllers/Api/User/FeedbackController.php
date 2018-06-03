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
        $tutoring_agency = TutoringAgency::select('id')->where('slug', $slug)->first();

        $check = Rating::select('id')
            ->where(['data_user_id' => $request->user_id, 'tutoring_agency_id' => $tutoring_agency->id])
            ->first();
        if (count($check) > 0){
            return response()->json(['msg' => 'Sudah Memberikan Feedback Sebelumnya'], 204);
        }

        $tutoring_agency->feedback()->create([
            'data_user_id' => $request->user_id,
            'rating' => $request->rating,
            'comment' => $request->comment
        ]);

        $tutoring_agency->update([
            'rating' => $this->countRating($tutoring_agency->id)
        ]);

        return response()->json(['msg' => 'Feedback Berhasil'], 200);
    }

    public function showFeedbackLembaga($slug)
    {

    }

    private function countRating($tutoring_agency_id)
    {
        return Rating::where('tutoring_agency_id', $tutoring_agency_id)->avg('rating');
    }
}
