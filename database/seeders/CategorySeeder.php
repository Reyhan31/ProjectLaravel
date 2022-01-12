<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('category')->insert([
            [
                'id' => 1,
                'category_name' => 'Burger',
                'category_image' => 'assets/burger.jpg'
            ],
            [
                'id' => 2,
                'category_name' => 'Pizza',
                'category_image' => 'assets/pizza.jpg'
            ]]);
    }
}
