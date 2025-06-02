<?php

namespace Regularuser548\LaravelPhoneBook\Database\Seeders;

use Illuminate\Database\Seeder;
use Regularuser548\LaravelPhoneBook\Models\Contact;
use Regularuser548\LaravelPhoneBook\Models\Phone;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Contact::factory(10)->has(Phone::factory(3))->create();
    }
}
