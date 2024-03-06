<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'location' => $this->faker->address,
            'start_datetime' => $this->faker->dateTime($max = 'now', $timezone = null),
            'end_datetime' => $this->faker->dateTime($max = 'now', $timezone = null),
            'type' => $this->faker->randomElement(['Physical', 'Online']),
            'price' => $this->faker->numberBetween($min = 0, $max = 1000),
            'tickets_available' => $this->faker->numberBetween(10, 200),
            'image' => $this->faker->imageUrl(),

            'is_published' => false,
            'reservation_type' => $this->faker->randomElement(['automatique', 'manuelle']),
            
            'user_id' => $this->faker->numberBetween(DB::table('users')->min('id'),DB::table('users')->max('id')),
            'category_id' => $this->faker->numberBetween(DB::table('categories')->min('id'),DB::table('categories')->max('id')),
        ];
    }
}
