<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory as FactoriesFactory;

class AuthorFactory extends FactoriesFactory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Author::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->email(),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'avatar' => fake()->imageUrl(),
            'dob' => fake()->dateTimeThisCentury(),
        ];
    }
}
