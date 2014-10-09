<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('AssetSeederTableSeeder');
	}

}

use Faker\Factory as Faker; 
 
class AssetSeederTableSeeder extends Seeder { 
 
        public function run() 
        { 
                $faker = Faker::create(); 
 
                foreach(range(1, 100) as $index) 
                { 
                        Asset::create([ 
                                'accession' => $faker->randomNumber(8), 
                                'uri_path' => $faker->imageUrl(640, 480, 'nature')       
                        ]); 
                } 
        } 
 
} 

