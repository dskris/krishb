<?php

use Illuminate\Database\Seeder;

class videosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('videos')->insert([
    		[
		        	'path' => '/public/videos/path.png',
		        	'created_at' => new DateTime,
		        	'updated_at' => new DateTime
		     ],
        ]);
    }
}
