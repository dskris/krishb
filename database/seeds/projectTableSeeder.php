<?php

use Illuminate\Database\Seeder;

class projectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('project')->insert([
        	[
	            'name' => 'property',
	            'location' => 'location',
		        'tenure' => 'tenure',
		        'projectStatusID' => 1,
		        'type' => 'type',
		        'price' => 9500000,
		        'builtSize' => 1600,
		        'storeyNo' => 5000,
		        'furnishingStatus' => 1,
		        'unitNo' => 1,
		        'passengerLiftNo' => 1,
		        'serviceLiftNo' => 1,
		        'locationMapID' => 1,
		        'description' => 'lorem ipsum',
		        'bedroomNo' => 1,
		        'bathroomNo' => 1,
		        'listingDescription' => 'lorem ipsum',
		        'facilitiesID' => 1,
		        'address' => 'address',
		        'GPSCoordinates' => '3.12026,101.62226809999993',
		        'floorplanID' => 1,
		        'listingImageID' => 1,
		        'salesGalleryID' => 1,
		        'propertyRatingID' => 1,
		        'status' => 1,
		        'created_at' => new DateTime,
		        'updated_at' => new DateTime
        	],
        	
         ]);
    }
}
