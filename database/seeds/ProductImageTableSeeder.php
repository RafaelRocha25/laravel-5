<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use CodeCommerce\ProductImage;
use Faker\Factory as Faker;

class ProductImageTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('product_images')->truncate();

        $faker = Faker::create();

        foreach(range(1, 10) as $i) {
            ProductImage::create([
                'product_id' => $faker->numberBetween(1,10),
                'extension'  => $faker->fileExtension()
            ]);
        }
    }

}
