<?php

use Illuminate\Database\Seeder;

class employeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
        	[
	            'name' => 'admin',
	        	'state' => 'Selangor',
	        	'branch' => 'PJ Branch',
	        	'employeeCategoryID' => 1,
	        	'biography' => 'lorem ipsum',
	        	'status' => 1,
		        'created_at' => new DateTime,
		        'updated_at' => new DateTime
        	],
        	
         ]);
    }
}
