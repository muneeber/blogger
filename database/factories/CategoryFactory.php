<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $webTechnologies = [
            "HTML",
            "CSS",
            "JavaScript",
            "PHP",
            "Python",
            "Ruby",
            "Java",
            "ASP.NET",
            "Node.js",
            "React",
            "Angular",
            "Vue.js",
            "Ruby on Rails",
            "Django",
            "Express.js",
            "Laravel"
        ];
            $title=fake()->randomElement($webTechnologies);
            $slug=Str::slug($title);
        return [
            'name'=>$title,
            'slug'=>$slug
        ];
    }
}
