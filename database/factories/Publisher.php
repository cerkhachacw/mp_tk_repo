<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory as FactoriesFactory;

class Publisher extends FactoriesFactory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Publisher::class;

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
        ];
    }
}
