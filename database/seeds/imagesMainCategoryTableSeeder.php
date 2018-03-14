<?php

use Illuminate\Database\Seeder;

class imagesMainCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('imagesMainCategory')->insert([
    		[
		        	'name' => 'Main 1',
		        	'created_at' => new DateTime,
		        	'updated_at' => new DateTime
		     ],
		     [
		        	'name' => 'Main 2',
		        	'created_at' => new DateTime,
		        	'updated_at' => new DateTime
		     ],
		      [
		        	'name' => 'Main 3',
		        	'created_at' => new DateTime,
		        	'updated_at' => new DateTime
		     ],
    }
}
