<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $products = [ '1', '2' ];

        foreach ( $products as $product ) {
            \App\Product::create( [
                'category_id'    => 1,
                'tag_id'         => 1,
                'bg'             => [
                    'name'        => 'Продукт' . $product,
                    'description' => 'Описание' . $product
                ],
                'en'             => [
                    'name'        => 'Product' . $product,
                    'description' => 'Description' . $product
                ],
                'purchase_price' => 100,
                'sale_price'     => 150,
                'stock'          => 100,
            ] );
        }
    }
}
