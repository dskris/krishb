<?php

use Illuminate\Database\Seeder;

class galleryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('gallery')->insert([
    		[
		        	'title' => 'title',
		        	'listingVideo' => 'public/video/pic.png',
		        	'listingImagesID' => 1,
		        	'biography' => 'lorem ipsum',
		        	'mainImage' => 1,
		        	'status' => 1,
		        	'created_at' => new DateTime,
		        	'updated_at' => new DateTime
		     ],

		 ]);
    }
}
