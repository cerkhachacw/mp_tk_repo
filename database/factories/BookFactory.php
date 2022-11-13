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
        $faker = \Faker\Factory::create('id_ID');
        return [
            'title' => $faker->name(),
            'description' => $faker->text(),
            'author_id' => Author::factory(),
            'publisher_id' => Publisher::factory(),
            'category_id' => Category::factory(),
            'price' => $faker->randomFloat(2, 0, 100),
            'quantity' => $faker->numberBetween(0, 100),
            'cover' => $faker->imageUrl(),
            'publish_date' => $faker->dateTimeThisCentury(),
        ];
    }
}
