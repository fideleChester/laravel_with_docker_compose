<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Livraison>
 */
class LivraisonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'prixUnitaire' => $this->faker->numberBetween($min = 1000, $max = 2000),
            'frais' => $this->faker->numberBetween($min = 1000, $max = 2000),
            'quantiteAchat' => $this->faker->numberBetween($min = 10, $max = 100),
            'produit_id' => $this->faker->numberBetween($min = 1, $max = 10),
            'fournisseur_id' => 1,
            'user_id' => 1,
        ];
    }
}
