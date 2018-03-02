<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'tutoring_agency_id','website','office_phone','mobile_phone','email','other_contacts','facebook','instagram'
    ];

    public function tutoring_agency()
    {
        return $this->belongsTo(TutoringAgency::class);
    }
}
