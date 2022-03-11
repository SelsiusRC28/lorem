<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'video' => $this->faker->randomDigit().'.- '.$this->faker->name(),
            'curso_id' => 1,
        ];
    }
}
