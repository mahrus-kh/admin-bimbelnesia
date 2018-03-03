<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AccountLogin extends Model
{
    protected $fillable = [
        'tutoring_agency_id','email','password'
    ];
}
