<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;   
use Illuminate\Support\Facades\Input;

class BusinessCard extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
        'main_activity',
        'founded_in',
        'number_of_employees',
        'locations',
        'benefits',
        'technologies',
        'office_out_country',
        'number_of_employees_bulgaria',
        'locations_bulgaria',
        'number_of_employees_worldwide',
        'locations_worldwide',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'benefits' => 'array',
    ];

    public function company()
    {
    	return $this->hasOne('App\Company');
    }

    public static function valid(Request $request)
    {
        $request->validate([
        'id'                                       => 'required',
        'main_activity'                            => 'required',
        'founded_in'                               => 'required',  
         //'number_of_employees'                      => 'required',
         //'locations'                                => 'required',
        //'benefits'                                 => 'required',
        //'technologies'                             => 'required',
        // 'office_out_country'                       => 'required',
         //'number_of_employees_bulgaria'             => 'required',
         //'locations_bulgaria'                       => 'required',
         //'number_of_employees_worldwide'            => 'required',
        // 'locations_worldwide'                      => 'required',
        // 'started_at'                               => 'required',
    ]);
        $businessCard = BusinessCard::create([
            'office_out_country' => $request->office_out_country,
            'founded_in' => $request->founded_in,
            'started_at' => $request->started_at,
            'number_of_employees_bulgaria' => $request->number_of_employees_bulgaria,
            'locations_bulgaria' => $request->locations_bulgaria,
            'number_of_employees_worldwide' => $request->number_of_employees_worldwide,
            'locations_worldwide' => $request->locations_worldwide,
            'number_of_employees' => $request->number_of_employees,
            'locations' => $request->locations,
            'technologies' => $request->technologies,
            'company_id' => $request->id,
            'main_activity' => $request->main_activity
        ]);
    }
}