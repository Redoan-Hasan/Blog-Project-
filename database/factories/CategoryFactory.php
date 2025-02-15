<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
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
        $categories = [
            'Web Development',
            'PHP & Laravel',
            'JavaScript & Frontend',
            'Database & SQL',
            'API Development',
            'DevOps & Deployment',
            'Security & Best Practices',
            'Performance Optimization',
            'Testing & Debugging',
            'Career & Freelancing'
        ];
        $category = fake()->unique()->randomElement($categories);
        return [
            'name'=> $category,
            'slug'=>str($category)->slug()->toString(),
            // 'slug'=>Str::slug($category),
        ];
    }
}
