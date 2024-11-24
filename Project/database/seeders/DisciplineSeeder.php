<?php

namespace Database\Seeders;

use App\Models\Discipline;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DisciplineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Discipline::create(
            [
                'name' => 'F-1D'
            ],
        );
        Discipline::create(
            [
                'name' => 'F-1E'
            ],
        );
        Discipline::create(
            [
                'name' => 'F-2B'
            ],
        );
    }
}
