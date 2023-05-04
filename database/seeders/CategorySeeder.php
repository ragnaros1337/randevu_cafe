<?php

namespace Database\Seeders;

use App\Models\Category;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content = ['Еда', 'Напитки', 'Сладкое', 'Соусы', 'Халяль'];
        if(!DB::table('categories')->exists()){
            for($i = 0; $i < count($content); $i++){
                Category::create(['title' => $content[$i]]);
            }
        }
    }
}
