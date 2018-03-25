<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class StudyProgram extends Model
{
    protected $fillable = [
        'tutoring_agency_id', 'study_program', 'cost'
    ];
}
