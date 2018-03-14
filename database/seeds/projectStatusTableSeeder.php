<?php

use Illuminate\Database\Seeder;

class projectStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projectStatus')->insert([
    		[
		        	'name' => 'New Launch',
		        	'created_at' => new DateTime,
		        	'updated_at' => new DateTime
		     ],
		     [
		        	'name' => 'None',
		        	'created_at' => new DateTime,
		        	'updated_at' => new DateTime
		     ],

        ]);
    }
}
