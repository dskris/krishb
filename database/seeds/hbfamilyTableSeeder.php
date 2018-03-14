<?php

use Illuminate\Database\Seeder;

class hbfamilyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('hbfamily')->insert([
        	[
	            'title' => 'title',
	        	'dateTime' => new DateTime,
	        	'location' => 'location',
	        	'description' => 'lorem ipsum',
	        	'imageID' => 1,
	        	'videoID' => 1,
	        	'categoryID' => 1,
	        	'status' => 1,
		        'created_at' => new DateTime,
		        'updated_at' => new DateTime
        	],
        	
         ]);
    }
}
