<?php

namespace Regularuser548\LaravelPhoneBook\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Regularuser548\LaravelPhoneBook\Models\Phone;

class PhoneFactory extends Factory
{
    protected $model = Phone::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number' => fake()->e164PhoneNumber()
        ];
    }
}
