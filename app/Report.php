<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'text',
];

    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    public function ad()
    {
        return $this->belongsTo('App\Ad');
    }

    public function user(){

        return $this->belongsTo('App\User');
        
    }
    
}
