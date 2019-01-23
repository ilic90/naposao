<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HostCompany extends Model
{
    protected $fillable = [
        'name',
        'country',
        'city',
        'address',
        'pib',
        'vat',
        'bank_name',
        'bank_country',
        'bank_city',
        'bank_address',
        'bic',
        'iban'
    ];
}
