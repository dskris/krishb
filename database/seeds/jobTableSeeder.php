<?php

use Illuminate\Database\Seeder;

class jobTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job')->insert([
        	[
	            'title' => 'job 1',
	            'minimumWorkExperience' => 5,
	            'state' => 'state',
	            'countryID' => 1,
	            'responsibilities' => 'eating',
	            'workLocation' => 'Subang',
	            'jobLevelID' => 1,
	            'status' => 1,
		        'created_at' => new DateTime,
		        'updated_at' => new DateTime
        	],
        	
         ]);
    }
}
