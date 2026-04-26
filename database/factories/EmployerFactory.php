<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Employer>
 */
class EmployerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => null, // Set to null by default, can be associated with a user later
            'company_name' => fake()->company(),
            'company_logo' => fake()->imageUrl(200, 200, 'business'),
            'company_website' => fake()->url(),
        ];
    }
}
