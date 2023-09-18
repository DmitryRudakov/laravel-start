<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(20)->create();
        \App\Models\Category::factory(3)->create();
        \App\Models\Article::factory(20)->create();

        // Get all the categories attaching up to 3 random categories to each article
        $categories = Category::all();

        // Populate the pivot table
        Article::all()->each(function ($article) use ($categories) {
            $article->categories()->sync(
                $categories->take(rand(1, 3))->pluck('id')->toArray()
            );
        });

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
