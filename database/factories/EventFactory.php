<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(3),
            'start_time' => fake()->dateTimeBetween('now', '+1 year'),
            'link' => fake()->url(),
            'description' => fake()->text(500),
        ];
    }
}
