<?php

namespace Database\Seeders;

use App\Models\Competition;
use App\Models\ParticipantsNumber;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(CategorySeeder::class);
        $this->call(DisciplineSeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(ParticipantsNumberSeeder::class);

        Competition::factory(50)->create();
    }
}
