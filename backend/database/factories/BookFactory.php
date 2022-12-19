<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
    public function definition()
    {
        $user = \App\Models\User::factory();

        return [
            'user_id' => $user,
            'title' => $this->faker->unique()->name(),
            'author_id' => \App\Models\BookAuthor::factory(['user_id' => $user]),
            'published_at' => $this->faker->dateTimeBetween('-40 years', 'now'),
        ];
    }
}
