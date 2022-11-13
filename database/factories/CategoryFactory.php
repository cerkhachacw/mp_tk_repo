<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\CategoryGroup;
use Illuminate\Database\Eloquent\Factories\Factory as FactoriesFactory;

class CategoryFactory extends FactoriesFactory
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
        $faker = \Faker\Factory::create('id_ID');
        return [
            'name' => $faker->name(),
            'description' => $faker->text(),
            'slug' => $faker->slug(),
            'category_group_id' => CategoryGroup::factory(),
        ];
    }
}
