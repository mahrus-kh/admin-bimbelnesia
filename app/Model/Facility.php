<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $fillable = [
        'tutoring_agency_id', 'facility'
    ];
}
