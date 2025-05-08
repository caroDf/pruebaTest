<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'published_date' => $this->faker->year(),
            'author_id' => \App\Models\Author::factory()->create()->id,
            'user_id' => \App\Models\User::factory()->create()->id,
            'genre_id' => \App\Models\Genre::factory()->create()->id,
        ];
    }
}
