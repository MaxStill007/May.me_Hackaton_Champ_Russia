<?php

namespace Database\Seeders;

use App\Models\ParticipantsNumber;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParticipantsNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ParticipantsNumber::create(
            [
                'number' => 80
            ],
        );
        ParticipantsNumber::create(
            [
                'number' => 60
            ],
        );
        ParticipantsNumber::create(
            [
                'number' => 40
            ],
        );
        ParticipantsNumber::create(
            [
                'number' => 50
            ],
        );
    }
}
