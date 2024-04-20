<?php

namespace Database\Factories;

use App\Models\Categorie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categorie>
 */
class CategorieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titre'=>$this->faker->word(),
            'slug'=>$this->faker->unique()->slug,
            'resume'=>$this->faker->sentences(3, true),
            'photo'=>$this->faker->imageUrl('350','350'),
            'statut'=>$this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
