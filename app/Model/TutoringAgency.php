<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TutoringAgency extends Model
{
    protected $fillable = [
        'category_id','sub_category_id','slug','tutoring_agency','address','description','tags','verified','rating','total_views'
    ];

    protected $casts =[
        'category_id' => 'array',
        'sub_category_id' => 'array',
        'tags' => 'array'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function contact()
    {
        return $this->hasOne(Contact::class);
    }

    public function excellence()
    {
        return $this->hasMany(Excellence::class);
    }

    public function facility()
    {
        return $this->hasMany(Facility::class);
    }

    public function study_program()
    {
        return $this->hasMany(StudyProgram::class);
    }

    public function account_login()
    {
        return $this->hasOne(AccountLogin::class);
    }
}
