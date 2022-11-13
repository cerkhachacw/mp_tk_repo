<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Database\Eloquent\Factories\Factory as FactoriesFactory;

class BookFactory extends FactoriesFactory
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
            'author_id' => Author::factory(),
            'publisher_id' => Publisher::factory(),
            'category_id' => Category::factory(),
            'price' => fake()->randomFloat(2, 0, 100),
            'quantity' => fake()->numberBetween(0, 100),
            'cover' => fake()->imageUrl(),
            'publish_date' => fake()->dateTimeThisCentury(),
        ];
    }
}
