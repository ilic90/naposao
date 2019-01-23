<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ad as Ad;
use Illuminate\Support\Facades\Auth as Auth;

class Category extends Model
{

 	protected $fillable = [
    	'name',
    ];

    public function ads()
    {
    	return $this->belongsToMany('App\Ad', 'ad_categories', 'ad_id', 'category_id');
	}

    public static function getCategories()
    {
    	return Category::all();
    }

    public static function getCategoriesByCompany($cid)
    {
        $categories = Company::where('id', $cid)->pluck('sector');
        return array_map('intval', explode(',', $categories[0]));
    }

    
}