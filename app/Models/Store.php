<?php

# app/Models/Quote.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Store extends Model  
{
	protected $fillable = ['id', 'store_number', 'name', 'banner_id', 'province', 'city', 'sqft', 'mall_entrance', 'cashbanks' , 'district_id', 'classification_id', 'status_id']; 
	
	public static function getStoreList()
	{
		$stores = Store::select(
                    \DB::raw("CONCAT (id, ' - ' , name, ' , ', city ) as label, id as value")
                )->lists("label", "value");
        
        $searchList = [];
        
        foreach ($stores as $value => $label) {
            $searchItem = [
                'value' => $value,
                'label' => $label,
            ];
            array_push($searchList, ($searchItem) );
            
        }   
        
        return ( json_encode ( $searchList ) );
	}

	public static function getStoreDetailsByStoreid($id)
	{
		$storedetails = Store::where('store_number', $id)->first();
		if ($storedetails) {
			return $storedetails;
		}else{
			return array();
		}
	}
	public static function getStoreDetailsByBannerid($id)
	{
		$stores = Store::where('banner_id', $id)->get();
		if ($stores) {
			return $stores;
		}else {
			return array();
		}

	}
	public  static function getStoreDetailsByBannername($banner)
	{
		$banner_id = \DB::table('banners')->where('name', $banner)->first()->id;
		$stores = Store::where('banner_id', $banner_id)->get();
		if ($stores) {
			return $stores;
		}else {
			return array();
		}
	}
	public static function getStoreDetailsByProvince($province)
	{
		$stores = Store::where('province', $province)->get();
		if ($stores) {
			return $stores;
		}else {
			return array();
		}

	}
	public static function getStoreDetailsByCity($city)
	{
		$stores = Store::where('city', $city)->get();
		if ($stores) {
			return $stores;
		}else {
			return array();
		}
		
	}
	public static function getStoreDetailsByDistrictid($id)
	{
		$stores = Store::where('district_id', $id)->get();
		if ($stores) {
			return $stores;
		}else {
			return array();
		}
	}

	public static function getAllStores()
	{
		$stores = Store::select('id', 'store_id', 'store_number')->get();
		return $stores;
	}


}