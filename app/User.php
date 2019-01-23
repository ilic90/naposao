<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        
        'first_name',
        'last_name',
        'email',
        'password',
        'gender',
        'phone'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function application()
    {
        return $this->hasMany('App\Application', 'application_id');
    }

    public function image()
    {
        return $this->hasOne('App\Image');
    }

    public function favorite()
    {
        return $this->hasMany('App\Favorite','favorite_id');
    }

    public function coverLetter(){

        return $this->hasMany('App\CoverLetter');

    }

    public function cv(){

        return $this->hasMany('App\Cv');

    }

}
