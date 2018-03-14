<?php

use Illuminate\Database\Seeder;

class jobLevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jobLevel')->insert([
        	[
	            'name' => 'joblevel',
		        'created_at' => new DateTime,
		        'updated_at' => new DateTime
        	],
        	
         ]);
    }
}
