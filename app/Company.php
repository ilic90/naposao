<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\BusinessCard as BusinessCard;
use Carbon\Carbon;


class Company extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_name',
        'country',
        'foreign_name',
        'email',
        'password',
        'username',
        'register_type',
        'pib' ,
        'vat',
        'company_registered_office',
        'company_type',
        'sector',
        'company_website',
        'company_phone',
        'company_address',
        'first_name',
        'last_name',
        'position',
        'business_phone',
        'business_email',
        'manager_first_name',
        'manager_last_name',
        'manager_position',
        'manager_phone',
        'manager_email',
        'administrative_contact_first_name',
        'administrative_contact_last_name',
        'administrative_contact_position',
        'administrative_contact_business_phone',
        'administrative_contact_business_email',
        'promotion',
        'token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $sector = [
        'sector' => 'array',
    ];

    public function image()
    {
    	return $this->hasOne('App\Image');
    }

    public function businessCard()
    {
    	return $this->hasOne('App\BusinessCard');
    }

    public function ads()
    {
    	return $this->hasMany('App\Ad');
    }

    public static function getSectors(Request $request)
    {
        $sector = Company::where('id',$request->id)->get();
    	return $sector->sector;
    }

    public function cover()
    {
        return $this->hasOne('App\Cover');
    }

    public static function countApplicants($aid){
        $applications = Application::with('ad')->where('ad_id', $aid)->get();
        return $applications->count();
    }

    public function invoice(){

        return $this->hasMany('App/Invoice');

    }

    public function dateFormat($date){

        return Carbon::parse($date);

    }

}
