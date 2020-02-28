<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
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

            \App\Tag::create([
                'bg' => ['name' => 'Таг'.$product],
                'en' => ['name' => 'Tags'.$product],
            ]);

        }//end of foreach

    }//end of run
}
