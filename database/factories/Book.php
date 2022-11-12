<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Database\Eloquent\Factories\Factory as FactoriesFactory;

class Book extends FactoriesFactory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

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
            'author_id' => Author::factory(),
            'publisher_id' => Publisher::factory(),
            'category_id' => Category::factory(),
        ];
    }
}
