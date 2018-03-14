<?php

use Illuminate\Database\Seeder;

class galleryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('gallery')->insert([
    		[
		        	'mainCategoryID' => 1,
		        	'subCategoryID' => 1,
		        	'path' => 'public/img/pic.png',
		        	'created_at' => new DateTime,
		        	'updated_at' => new DateTime
		     ],
		     [
		        	'mainCategoryID' => 1,
		        	'subCategoryID' => 2,
		        	'path' => 'public/img/pic.png',
		        	'created_at' => new DateTime,
		        	'updated_at' => new DateTime
		     ],
    }
}
