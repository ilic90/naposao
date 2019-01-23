<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkHistory extends Model
{

    protected $fillable = [

        'cv_id',
        'position',
        'company_name',
        'year_from',
        'year_to',
        'month_from',
        'month_to',
        'description',
        'location',
        'business_sector'

    ];

    public function cv()
    {
    	return $this->belongsTo('App\Cv');
    }
}


