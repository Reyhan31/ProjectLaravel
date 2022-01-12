<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('menu')->insert([
            [
                'category_id' => 1,
                'menu_name' => 'Classic Burger',
                'menu_image' => 'assets/burger.jpg',
                'menu_price' => 10000
            ],
            [
                'category_id' => 1,
                'menu_name' => 'CheeseBurger',
                'menu_image' => 'assets/burger.jpg',
                'menu_price' => 20000
            ]]);
    }
}
