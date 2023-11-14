<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        $parentCategoryIds = Category::query()->pluck('id')->toArray();

        return [
            'parent_id' =>fake()->randomElement($parentCategoryIds),
            'image'=>fake()->image,
            'name'=>fake()->name,
            'description'=>fake()->text,
            'order'=>fake()->numberBetween(1,10),
            'status'=>rand(0,1),
        ];
    }
}
