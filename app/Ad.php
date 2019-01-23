<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Company as Company;
use App\Category as Category;
use Carbon\Carbon;

class Ad extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //ad_type: 1 = basic ad, 2 = standard, 3 = vip, 4 = premium
    protected $fillable = [
        'description',
        'category',
        'ref_number',
        'ad_type',
        'job_type',
        'low_experience',
        'term',
        'company_id',
        'career_level',
        'students',
        'country',
        'city',
        'salary_type',
        'salary_from',
        'salary_to',
        'currency',
        'foreign_languages',
        'questionnaire_id',
        'external_url',
        'position',
        'expiration_date',
        'confidential',
        'promote'
    ];

    public function company()
    {
    	return $this->belongsTo('App\Company');
    }

    public function categories()
    {
    	return $this->belongsToMany('App\Category', 'ad_categories');
	}


    public static function countAll()
    {
    	return Ad::where('approved','=','1')->count();
    }

    public static function countLastDay()
    {
    	return Ad::where('approved', '=', '1')->where('created_at', '>=', Carbon::today())->count();
    }

    public function applications()
    {
    	return $this->hasMany('App\Application');
    }

    public function languages()
    {
        return $this->belongsToMany('App\Language');
    }

    public function favorites()
    {
        return $this->hasMany('App\Favorite');
    }

    public function coverLetter(){

        return $this->hasMany('App\CoverLetter');

    }

    public function dateFormat($date){

    	return Carbon::parse($date);

    }

}