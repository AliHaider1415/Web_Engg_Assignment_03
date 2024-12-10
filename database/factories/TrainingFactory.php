<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TrainingFactory extends Factory
{
    protected $model = \App\Models\Training::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'trainer' => $this->faker->name,
            'fees' => $this->faker->randomFloat(2, 100, 1000),
            'duration' => $this->faker->randomElement(['2 days', '1 week', '4 weeks']),
            'start_date' => $this->faker->dateTimeBetween('+1 week', '+2 months'),
            'end_date' => $this->faker->dateTimeBetween('+2 months', '+4 months'),
            'mode' => $this->faker->randomElement(['online', 'offline', 'hybrid']),
            'location' => $this->faker->randomElement(['New York', 'London', 'Sydney', null]),
            'max_participants' => $this->faker->numberBetween(10, 50),
        ];
    }
}
