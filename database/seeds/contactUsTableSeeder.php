<?php

use Illuminate\Database\Seeder;

class contactUsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('contactUs')->insert([
        	[
	            'name' => 'admin',
	        	'email' => 'kris26ooi@gmail.com',
	        	'phoneNumber' => '0128939003',
	        	'message' => 'lorem ipsum',
	        	'status' => 1,
	        	'futurePromoID' => 1,
		        'created_at' => new DateTime,
		        'updated_at' => new DateTime
        	],
        	
         ]);
    }
}
