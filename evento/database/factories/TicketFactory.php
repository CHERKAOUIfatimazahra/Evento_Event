<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'place' => $this->faker->unique()->randomNumber(4),
            'user_id' => $this->faker->numberBetween(DB::table('users')->min('id'),DB::table('users')->max('id')),
            'event_id' => $this->faker->numberBetween(DB::table('events')->min('id'),DB::table('events')->max('id')),
            'status_reservation'=> $this->faker->randomElement(['pending', 'approved', 'rejected']),
        ];
    }
}
