<?php

use Illuminate\Database\Seeder;

class imagesSubCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('imagesSubCategory')->insert([
    		[
		        	'name' => 'Sub 1',
		        	'created_at' => new DateTime,
		        	'updated_at' => new DateTime
		     ],
		     [
		        	'name' => 'Sub 2',
		        	'created_at' => new DateTime,
		        	'updated_at' => new DateTime
		     ],
		      [
		        	'name' => 'Sub 3',
		        	'created_at' => new DateTime,
		        	'updated_at' => new DateTime
		     ],
    }
}
