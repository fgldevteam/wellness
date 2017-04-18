<?php

use Illuminate\Database\Seeder;
use App\Models\Store as Store;

class StoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stores= json_decode(file_get_contents(storage_path() . "/jsondata/stores.json"));

		foreach ($stores as $store) {
			Store::create([
				'id' 			=> $store->id,
				'store_number' 	=> $store->store_number,
				'name' 			=> $store->name,
				'banner_id' 	=> $store->banner_id,
				'province' 		=> $store->province,
				'city' 			=> $store->city,
				'sqft' 			=> $store->sqft,
				'mall_entrance' => $store->mall_entrance,
				'district_id'	=> $store->district_id,
				'classification_id'=>$store->classification_id,
				'status_id'		=> $store->status_id,
				'cashbanks' 	=> $store->cashbanks

				]);
		}

		$addresses = json_decode(file_get_contents(storage_path()."/jsondata/storeaddress.json"));
		foreach ($addresses as $address) {
			$store = Store::find($address->id);
			var_dump($address);
			Store::where('id', $address->id)
				 ->update(['address1' => $address->address,
						   'postal_code'=>$address->postal_code,
				 		   'lat'=> $address->lat,
				 		   'long'=>$address->long
					 	]);
		
		}
    }
}
