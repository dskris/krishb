<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	[
	            'name' => 'admin',
	        	'username' => 'admin',
	        	'email' => 'admin@gmail.com',
	        	'password' => bcrypt('adminlte'),
	        	'status' => '1',
	        	'isAdmin' => '1',
	        	'access_type' => '',
		        'created_at' => new DateTime,
		        'updated_at' => new DateTime
        	],
        	
         ]);
    }
}
