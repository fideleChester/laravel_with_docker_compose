<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetailCommande>
 */
class DetailCommandeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'quantiteVendue' => $this->faker->numberBetween($min = 1, $max = 9),
            'produit_id' => $this->faker->numberBetween($min = 1, $max = 10),
            'commande_id' => $this->faker->numberBetween($min = 1, $max = 10),
            'prixVente' => $this->faker->numberBetween($min = 2000, $max = 2500),
            'frais' => $this->faker->numberBetween($min = 1000, $max = 2000),
            // 'user_id' => 1,
        ];
    }
}
