<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
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
            'datetime' => $this->faker->dateTimeBetween('-1 week', '+3 months'),
            'num_people' => $this->faker->numberBetween(1, 10),
            'created_at' => $this->faker->dateTimeBetween('-1 week', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 week', 'now'),
            'client_id' => function () {
                return Client::factory()->create()->id;
            },
            'restaurant_id' => function () {
                return Restaurant::factory()->create()->id;
            },
        ];
    }
}
