<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = [
        'data_user_id', 'tutoring_agency_id', 'rating', 'comment'
    ];

    public function tutoring_agency()
    {
        return $this->belongsTo(TutoringAgency::class);
    }

    public function dataUser()
    {
        return $this->belongsTo(DataUser::class);
    }
}
