<?php

use Illuminate\Database\Seeder;

class employeeCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employeeCategory')->insert([
        	[
	            'position' => 'Director',
		        'created_at' => new DateTime,
		        'updated_at' => new DateTime
        	],
        	
         ]);
    }
}
