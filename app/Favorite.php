<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

class Favorite extends Model
{
    protected $fillable = [
    'user_id',
    'ad_id',
	];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function ad()
    {
    	return $this->belongsTo('App\Ad');
    }

    public static function isFavorite($aid)
    {
        return Favorite::where('user_id', Session::get('user')->id)->where('ad_id', $aid)->get()->count();
    }


}
