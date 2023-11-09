<?php

namespace Database\Factories;

use App\Http\Controllers\CategoryController;
use App\Models\category;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();
        $title=$faker->sentence(8, true);
        $slug=Str::slug($title);
        return [
            'title' => $title,
            'excerpt' => $faker->sentence(10),
            'slug' => $slug,
            'description' => $faker->realText(600),
            'status' => 1,
            'category_id' => Category::inRandomOrder()->value('name'),
            'user_id' => User::inRandomOrder()->value('id'),

        ];
    }
}
