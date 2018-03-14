<?php

use Illuminate\Database\Seeder;

class agentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('agent')->insert([
        	[
	            'name' => 'name',
	        	'email' => 'kris26ooi@gmail.com',
	        	'phoneNumber' => '0128927882',
		        'created_at' => new DateTime,
		        'updated_at' => new DateTime
        	],
        	
         ]);
    }
}
