<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(
            [
                'name' => 'ВСЕРОССИЙСКИЕ СОРЕВНОВАНИЯ'
            ],
        );
            Category::create(
            [
                'name' => 'ЧЕМПИОНАТ ЦЕНТРАЛЬНОГО ФЕДЕРАЛЬНОГО ОКРУГА'
            ],
        );
            Category::create(
            [
                'name' => 'КУБОК РОССИИ'
            ],
        );
            Category::create(
            [
                'name' => 'ЧЕМПИОНАТ ЦЕНТРАЛЬНОГО ФЕДЕРАЛЬНОГО ОКРУГА'
            ]
        );
    }
}
