<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake('ru_RU')->sentence();
        $user_id = User::query()->inRandomOrder()->value('id');

        return [
            //
            'user_id' => $user_id,
            'title' => $title,
            'slug' => Str::slug($title),
            'text' => fake()->text
        ];
    }
}
