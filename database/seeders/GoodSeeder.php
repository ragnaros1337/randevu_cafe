<?php

namespace Database\Seeders;

use App\Models\Good;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class GoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $title = ['Бургер', 'Кола', 'Майонез', 'Сахар', 'Мясо'];
        $faker = Faker::create();
        if(!DB::table('goods')->exists()){
            for($i = 1; $i<=15; $i++){
                $temp_title = $title[rand(0,4)];
                $temp_category = match ($temp_title) {
                    'Кола' => 2,
                    'Бургер' => 1,
                    'Майонез' => 4,
                    'Сахар' => 3,
                    'Мясо' => 5,
                    default => '',
                };
                $temp_image = match ($temp_title) {
                    'Кола' => 'cola.webp',
                    'Бургер' => 'burger.webp',
                    'Майонез' => 'souse.webp',
                    'Сахар' => 'sugar.webp',
                    'Мясо' => 'halal.webp',
                    default => '',
                };
                Good::create([
                     'title' => $temp_title . ' ' . $faker->numberBetween(0, 10),
                     'article' => $faker->unique()->numberBetween(12000, 13000),
                     'description' => $faker->text('200'),
                     'preview_image' => 'images/'.$temp_image,
                     'price' => $faker->numberBetween(100, 1500),
                     'count' => $faker->numberBetween(1, 20),
                     'category_id' => $temp_category
                             ]);
            }
        }
    }
}
