<?php

use Illuminate\Database\Seeder;

class saleStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('saleStatus')->insert([
    		[
		        	'name' => 'Sale',
		        	'created_at' => new DateTime,
		        	'updated_at' => new DateTime
		     ],
		     [
		        	'name' => 'Rent',
		        	'created_at' => new DateTime,
		        	'updated_at' => new DateTime
		     ],
    }
}
