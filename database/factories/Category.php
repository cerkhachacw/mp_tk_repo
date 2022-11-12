<?php

namespace Database\Factories;

use App\Models\CategoryGroup;
use Illuminate\Database\Eloquent\Factories\Factory as FactoriesFactory;

class Category extends FactoriesFactory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'description' => fake()->text(),
            'slug' => fake()->slug(),
            'category_group_id' => CategoryGroup::factory(),
        ];
    }
}
