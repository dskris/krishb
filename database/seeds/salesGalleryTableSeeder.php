<?php

use Illuminate\Database\Seeder;

class salesGalleryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('salesGallery')->insert([
        	[
	            'location' => 'Subang',
	        	'email' => 'kris26ooi@gmail.com',
	        	'phoneNumber' => '0128939003',
		        'created_at' => new DateTime,
		        'updated_at' => new DateTime
        	],
        	
         ]);
    }
}
