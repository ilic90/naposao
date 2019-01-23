<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Application as Application;


class Language extends Model
{
protected $fillable = [
        'language',
    ];

    public function ads()
    {
    	return $this->belongsToMany('App\Ad');
    }

    public static function getLanguages()
    {
        return Language::all();
    }
/*
    public function users()
    {
        return $this->belongsToMany('App\User');
    }*/
}