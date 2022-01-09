<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TripFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'title'        => $this->faker->name(),
            'origin'       => $this->faker->city(),
            'destination'  => $this->faker->city(),
            'start_date'   => $this->faker->dateTimeBetween($startDate = '-30 days', $endDate = '-20 days'),
            'end_date'     => $this->faker->dateTimeBetween($startDate = '-19 days', $endDate = 'now'),
            'type_of_trip' => $this->faker->text(),
            'description'  => $this->faker->text()
        ];
    }
}
