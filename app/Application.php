<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Company as Company;
use App\User as User;


class Application extends Model
{

    protected $fillable = [
        'user_id',
        'ad_id',
        'company_id',
        'notiffication',
    ];

    public function messages()
    {
    	return $this->hasMany('App\Message');
    }

    public function company()
    {
    	return $this->belongsTo('App\Company');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

   	public function Ad()
    {
    	return $this->belongsTo('App\Ad', 'ad_id');
    }


}
