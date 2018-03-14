<?php

use Illuminate\Database\Seeder;

class categoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('category')->insert([
    		[
		        	'name' => 'HB Family',
		        	'created_at' => new DateTime,
		        	'updated_at' => new DateTime
		     ],
    }
}
