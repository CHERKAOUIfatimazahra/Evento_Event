<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'event_id' => $this->faker->numberBetween(DB::table('events')->min('id'),DB::table('events')->max('id')),
            'user_id' => $this->faker->numberBetween(DB::table('users')->min('id'),DB::table('users')->max('id')),
            'place' => $this->faker->unique()->randomNumber(4),
            'status_reservation'=> $this->faker->randomElement(['pending', 'approved', 'rejected']),
        ];
    }
}
