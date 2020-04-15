<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ABCDans extends Model
{
    //
    protected $fillable = ['date','amount','balance','dans','countryPart','line','channel','type','purpose','user_id'];
}
