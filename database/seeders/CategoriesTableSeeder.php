<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Category::create(['name' => 'Fashion']);

        $clothing = Category::create(['name' => 'Clothing']);
        $shoes = Category::create(['name' => 'Shoes']);
        $accessories = Category::create(['name' => 'Accessories']);

        $clothing->children()->create(['name' => 'Men\'s Clothing']);
        $clothing->children()->create(['name' => 'Women\'s Clothing']);

        $shoes->children()->create(['name' => 'Men\'s Shoes']);
        $shoes->children()->create(['name' => 'Women\'s Shoes']);
    }
}
