<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Leak>
 */
class LeakFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title(),
            'images' => $this->faker->imageUrl(350,350),
            'link' => $this->faker->url(),
            'tags' => $this->faker->word(6),
        ];
    }
}
