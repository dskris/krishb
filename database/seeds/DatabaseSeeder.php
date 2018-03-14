<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(UsersTableSeeder::class);
    	$this->call(countryTableSeeder::class);
    	$this->call(imagesSubCategoryTableSeeder::class);
    	$this->call(imagesMainCategoryTableSeeder::class);
    	$this->call(imagesTableSeeder::class);
    	$this->call(galleryTableSeeder::class);
    	$this->call(projectStatusTableSeeder::class);
    	$this->call(furnishingTableSeeder::class);
    	$this->call(saleStatusTableSeeder::class);
    	$this->call(categoryTableSeeder::class);
    	$this->call(videosTableSeeder::class);
    	$this->call(employeeCategoryTableSeeder::class);
    	$this->call(employeesTableSeeder::class);
    	$this->call(contactUsTableSeeder::class);
    	$this->call(salesGalleryTableSeeder::class);
    	$this->call(propertyRatingTableSeeder::class);
    	$this->call(newsTableSeeder::class);
    	$this->call(eventsTableSeeder::class);
    	$this->call(hbfamilyTableSeeder::class);
    	$this->call(newsletterTableSeeder::class);
    	$this->call(agentTableSeeder::class);
    	$this->call(applicationTableSeeder::class);
    	$this->call(amenitiesTableSeeder::class);
    	$this->call(facilitiesTableSeeder::class);
    	$this->call(propertyTableSeeder::class);
    	$this->call(jobLevelTableSeeder::class);
    	$this->call(jobTableSeeder::class);
    	$this->call(projectTableSeeder::class);

    }
}
