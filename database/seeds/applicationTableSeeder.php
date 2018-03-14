<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class applicationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('application')->insert([
        	[
	            'name' => 'name',
	        	'applicationDate' => Carbon::now()->toDateString(),
	        	'uploadedResume' => 'pathtoresume',
	        	'phoneNumber' => '0128928993',
	        	'currentCompany' => 'company abc',
	        	'description' => 'lorem ipsum',
		        'created_at' => new DateTime,
		        'updated_at' => new DateTime
        	],
        	
         ]);
    }
}
