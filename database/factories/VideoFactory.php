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
            'title' => $this->faker->randomDigit().'.- '.$this->faker->name(),
            'curso_id' => 1,
            'video' => 'https://player.vimeo.com/video/35648453?h=8c35b6df41'
        ];
    }
}
