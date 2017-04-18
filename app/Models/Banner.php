<?php

# app/Models/Quote.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Banner extends Model  
{
	protected $fillable = ['id', 'name']; 
	
	
	public static function getBannerList()
	{
		$banners = Banner::all();
		if ($banners) {
			return $banners;
		}else {
			return array();
		}
	}

}