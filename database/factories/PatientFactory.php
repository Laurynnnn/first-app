<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Patient;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),       // Generates a first name
            'last_name' => fake()->lastName(),         // Generates a last name
            'gender' => fake()->randomElement(['M', 'F']), // Randomly selects from the provided options
            // 'nin' => fake()->text('14'),
            'nin' => fake()->unique()->regexify('(CF|CM)[0-9, A-Z]{12}'), // Generates a unique NIN with prefix CF or CM
            'date_of_birth' => fake()->date(), // Generates a date of birth in a specified range
            'marital_status' => fake()->randomElement(['1', '2', '3', '4']), // Randomly selects from the provided options
            'phone_number' => fake()->phoneNumber(),   // Generates a phone number
            'next_of_kin' => fake()->name(),           // Generates a name for the next of kin
            'nok_phone_number' => fake()->phoneNumber(), // Generates a phone number for the next of kin
            'relationship' => fake()->randomElement(['1', '2', '3', '4', '5']), // Randomly selects from the provided options
        ];
    }
}
