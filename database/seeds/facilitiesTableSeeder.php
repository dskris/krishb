<?php

use Illuminate\Database\Seeder;

class facilitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('facilities')->insert([
        	[
	            'name' => 'facilities',
		        'created_at' => new DateTime,
		        'updated_at' => new DateTime
        	],
        	
         ]);
    }
}
