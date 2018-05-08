<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'data_user_id', 'tutoring_agency_id', 'comment'
    ];

    public function tutoring_agency()
    {
        return $this->belongsTo(TutoringAgency::class);
    }
}
