<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = ['1', '2'];

        foreach ($products as $product) {

            \App\Category::create([
                'bg' => ['name' => 'Категория'.$product],
                'en' => ['name' => 'Category'.$product],
                ]);

				\App\Tag::create([
                'bg' => ['name' => 'Tag1-2'.$product],
                'en' => ['name' => 'Tags-1'.$product],
            ]);

        }

    }

}
