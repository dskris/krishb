<?php

use Illuminate\Database\Seeder;

class newsletterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
         DB::table('newsletter')->insert([
        	[
	            'name' => 'name',
	        	'dateTime' => new DateTime,
	        	'location' => 'location',
	        	'description' => 'lorem ipsum',
	        	'status' => 1,
		        'created_at' => new DateTime,
		        'updated_at' => new DateTime
        	],
        	
         ]);
    }
}
