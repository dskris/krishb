<?php

use Illuminate\Database\Seeder;

class propertyRatingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('propertyRating')->insert([
        	[
	            'moneyWorth' => 10,
	        	'safetyWorth' => 10,
	        	'facilities' => 10,
	        	'value' => 10,
	        	'accessibility' => 10,
	        	'density' => 10,
		        'created_at' => new DateTime,
		        'updated_at' => new DateTime
        	],
        	
         ]);
    }
}
