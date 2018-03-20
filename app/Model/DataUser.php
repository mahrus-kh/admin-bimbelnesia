<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DataUser extends Model
{
    protected $fillable = [
        'name','phone','address','email','password','status'
    ];
}
