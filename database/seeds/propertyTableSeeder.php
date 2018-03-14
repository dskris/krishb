<?php

use Illuminate\Database\Seeder;

class propertyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('property')->insert([
        	[
	            'name' => 'property',
		        'tenure' => 'tenure',
		        'saleStatusID' => 1,
		        'type' => 'type',
		        'price' => 9500000,
		        'builtSize' => 1600,
		        'landSize' => 5000,
		        'furnishingStatus' => 1,
		        'bedroomNo' => 1,
		        'bathroomNo' => 1,
		        'listingDescription' => 'lorem ipsum',
		        'facilitiesID' => 1,
		        'amenitiesID' => 1,
		        'address' => 'address',
		        'GPSCoordinates' => '3.12026,101.62226809999993',
		        'floorplanID' => 1,
		        'listingImageID' => 1,
		        'agentID' => 1,
		        'status' => 1,
		        'created_at' => new DateTime,
		        'updated_at' => new DateTime
        	],
        	
         ]);
    }
}
