<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PostTag>
 */
class PostTagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'post_id' => random_int(1, 70),
            'tag_id' => random_int(1, 20),
            'user_id' => random_int(1, 10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}