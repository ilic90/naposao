<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CvFile extends Model
{
    protected $fillable = [
        'cv_id','path'
    ];

    public function cv(){

        return $this->belongsTo('App\Cv');

    }

    public function message(){

        return $this->hasOne('App\Message');

    }

}
