<?php

namespace Database\Factories;

use App\Models\Categorie;
use App\Models\Marque;
use App\Models\User;
use App\Models\Vendeur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produit>
 */
class ProduitFactory extends Factory
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
            'resume'=>$this->faker->text(),
            'description'=>$this->faker->paragraphs(4,true),
            'return_cancellation'=>$this->faker->paragraphs(4,true),
            'stock'=>$this->faker->numberBetween(2,10),
            'cat_id'=>$this->faker->randomElement(Categorie::pluck('id')->toArray()),
            'vendeur_id'=>$this->faker->randomElement(Vendeur::pluck('id')->toArray()),
            'photo'=>$this->faker->imageUrl('400','400'),
            'prix'=>$this->faker->numberBetween(100,10000),
            'offre_prix'=>$this->faker->numberBetween(100,10000),
            'reduction'=>$this->faker->numberBetween(10,60),
            'poids'=>$this->faker->numberBetween(1,30),
            'condition'=>$this->faker->randomElement(['Nouveau', 'Par default']),
            'statut'=>$this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
