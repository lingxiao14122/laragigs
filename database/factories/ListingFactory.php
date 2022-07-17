<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $tags = ['laravel', 'api', 'javascript'];
        return [
            'title' => $this->faker->jobTitle(),
            'tags' => "{$tags[array_rand($tags)]}, {$tags[array_rand($tags)]}",
            'email' => $this->faker->companyEmail(),
            'website' => $this->faker->url(),
            'company' => $this->faker->company(),
            'location' => $this->faker->city(),
            'description' => $this->faker->paragraph(5),
        ];
    }
}
