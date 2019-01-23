<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'invoice_id',
        'company_id',
        'first_name',
        'last_name',
        'email',
        'city',
        'state',
        'zip',
        'state_number',
        'phone',
        'address',
        'package',
        'amount',
        'tax',
    ];

    public function company(){

        return $this->belongsTo('App\Company');
        
    }
}
