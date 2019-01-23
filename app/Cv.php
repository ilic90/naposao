<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    protected $fillable = [

        'user_id',
        'title',
        'first_name',
        'last_name',
        'phone',
        'post_address',
        'birthdate',
        'citizenship',
        'country',
        'city',
        'computer_skills',
        'skills',
        'driving_licence',
        'native_language',
        'foreign_languages',
        'email',
        'gender'

    ];

    public function user(){

        return $this->belongsTo('App\User');

    }

    public function workHistory(){

        return $this->hasMany('App\WorkHistory');

    }

    public function education(){

        return $this->hasMany('App\Education');

    }

    public function cvFile(){

        return $this->hasOne('App\CvFile');

    }


}
