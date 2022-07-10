<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Girl>
 */
class GirlFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'slug' => $this->faker->slug(),
            'link' => $this->faker->url(),
            'images' => $this->faker->imageUrl(),
            'info' => $this->faker->text(),
            'status' => $this->faker->randomElement(['published', 'draft']),
        ];
    }
}
