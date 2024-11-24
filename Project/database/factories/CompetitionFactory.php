<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Discipline;
use App\Models\Location;
use App\Models\ParticipantsNumber;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Competition>
 */
class CompetitionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'age' => fake()->numberBetween(14, 18),
            'category_id' => Category::inRandomOrder()->first()->id,
            'discipline_id' => Discipline::inRandomOrder()->first()->id,
            'start' => fake()->date(),
            'end' => fake()->date(),
            'location_id' => Location::inRandomOrder()->first()->id,
            'participants_number_id' => ParticipantsNumber::inRandomOrder()->first()->id
        ];
    }
}
