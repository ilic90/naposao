<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
    'user_id',
    'company_id',
    'path',
];
    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
