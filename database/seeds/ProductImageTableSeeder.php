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

    }

}
