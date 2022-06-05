<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
 */
class VideoFactory extends Factory
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
            'poster' => $this->faker->imageUrl(350,350),
            'embed_link' => $this->faker->url(),
            'drive_id' => $this->faker->randomDigit(),
            'tags' => $this->faker->word(6),
        ];
    }
}
