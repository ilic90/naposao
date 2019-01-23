<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    
    protected $fillable = [

        'cv_id',
        'year_from',
        'month_from',
        'year_to',
        'month_to',
        'school',
        'location',
        'level',
        'description'

    ];

    public function cv(){

        return $this->balongsTo('App\Cv');

    }

}
