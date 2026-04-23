<?php

namespace Database\Factories;

use App\Models\Job;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'employer_id' => \App\Models\Employer::factory(),
            'title' => fake()->jobTitle(),
            'salary' => fake()->numberBetween(30000, 150000),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Job $job) {
            // Attach 3 random tags to the job after it's created
            $tags = Tag::factory()->count(3)->create();
            $job->tags()->attach($tags->pluck('id')->toArray());
        });
    }
}
