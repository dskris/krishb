<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class newsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         DB::table('news')->insert([
        	[
	            'title' => 'title',
	        	'newsDate' => Carbon::now()->toDateString(),
	        	'newsLocation' => 'location',
	        	'fullNews' => 'lorem ipsum',
	        	'videosID' => 1,
	        	'imageID' => 1,
	        	'status' => 1,
		        'created_at' => new DateTime,
		        'updated_at' => new DateTime
        	],
        	
         ]);
    }
}
