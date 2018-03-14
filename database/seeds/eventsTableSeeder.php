<?php

use Illuminate\Database\Seeder;

class eventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
        	[
	            'title' => 'title',
	        	'dateTime' => new DateTime,
	        	'location' => 'location',
	        	'description' => 'lorem ipsum',
	        	'imageID' => 1,
	        	'status' => 1,
		        'created_at' => new DateTime,
		        'updated_at' => new DateTime
        	],
        	
         ]);
    }
}
