<?php

use Illuminate\Database\Seeder;

class furnishingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('furnishing')->insert([
    		[
		        	'name' => 'Half',
		        	'created_at' => new DateTime,
		        	'updated_at' => new DateTime
		     ],
		     [
		        	'name' => 'Full',
		        	'created_at' => new DateTime,
		        	'updated_at' => new DateTime
		     ],
		     [
		        	'name' => 'None',
		        	'created_at' => new DateTime,
		        	'updated_at' => new DateTime
		     ],
    }
}
