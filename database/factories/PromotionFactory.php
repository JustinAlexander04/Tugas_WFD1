<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Promotion>
 */
class PromotionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => 'Event ' . $this->faker->word(),
            'description' => $this->faker->paragraphs(3, true),
            'image' => 'promotions/promo-' . $this->faker->numberBetween(1, 5) . '.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
