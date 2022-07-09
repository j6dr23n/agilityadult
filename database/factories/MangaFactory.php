<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Manga>
 */
class MangaFactory extends Factory
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
            'slug' => $this->faker->slug(),
            'genres' => $this->faker->word(6),
            'tags' => $this->faker->word(8),
            'info' => $this->faker->sentence(12),
            'poster' => $this->faker->imageUrl(250, 550),
            'status' => $this->faker->randomElement(['Ongoing', 'Finished']),
        ];
    }
}
