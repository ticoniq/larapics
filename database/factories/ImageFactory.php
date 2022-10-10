<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $title = fake()->sentence(),
            'slug' => Str::slug($title),
            'file' => fake()->imageUrl($width = 1925, $height = 1285),
            'dimention' => $width ."*". $height,
            'views_count' => fake()->randomNumber(5),
            'downloads_count' => fake()->randomNumber(5),
            'is_published' => true,
            'user_id' => User::factory(),
        ];
    }
}
