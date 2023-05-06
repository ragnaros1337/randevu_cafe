<?php

namespace Database\Seeders;

use App\Models\Good;
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
        //Это автоматическое заполнение. В оригинальном проекте все вбивается через админку.
        //Сделано для того чтобы были хоть какие-то данные для теста
        $content = [
            ['title' => 'Куры-гриль', 'description' => '', 'price' => 450, 'weight' => 1000],
            ['title' => 'Блины с мясом', 'description' => '', 'price' => 25, 'weight' => 70],
            ['title' => 'Блины со сгущенкой', 'description' => '', 'price' => 25, 'weight' => 70],
            ['title' => 'Котлеты', 'description' => 'Мясо свинина', 'price' => 45, 'weight' => 100],
            ['title' => 'Пельмени', 'description' => 'Мясо говядина/свинина', 'price' => 250, 'weight' => 1000],
        ];
        $title = ['Кола', 'Майонез', 'Сахар', 'Мясо'];
        $faker = Faker::create();
        if(!DB::table('goods')->exists()){
            for($i = 1; $i <= count($content); $i++){
                Good::create([
                                 'title' => $content[$i-1]['title'],
                                 'article' => $faker->unique()->numberBetween(12000, 13000),
                                 'description' => $content[$i-1]['description'],
                                 'preview_image' => 'images/burger.webp',
                                 'price' => $content[$i-1]['price'],
                                 'count' => $faker->numberBetween(1, 20),
                                 'weight' => $content[$i-1]['weight'],
                                 'category_id' => 1
                             ]);
            }
            for($i = 1; $i<=10; $i++){
                $temp_title = $title[rand(0,3)];
                $temp_category = match ($temp_title) {
                    'Кола' => 1,
                    'Майонез' => 3,
                    'Сахар' => 2,
                    'Мясо' => 4,
                    default => '',
                };
                $temp_image = match ($temp_title) {
                    'Кола' => 'cola.webp',
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
                     'weight' => rand(0.1, 1) * 100,
                     'category_id' => $temp_category + 1
                             ]);
            }
        }
    }
}
