<?php

namespace Regularuser548\LaravelPhoneBook\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Regularuser548\LaravelPhoneBook\Models\Contact;

class ContactFactory extends Factory
{
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->firstName(),
            'surname' => fake()->lastName(),
        ];
    }
}
