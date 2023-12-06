<?php

namespace Database\Factories;

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
            'libelle' => $this->faker->unique()->word(),
            'unite' => $this->faker->randomElement(['boites', 'piece', 'kg', 'litre']),

            'description' => $this->faker->text(),

            // 'prixVente' => $this->faker->numberBetween($min = 2000, $max = 2500),
            'quantite' => $this->faker->numberBetween($min = 10, $max = 100),
            'categorie_id' => 1,
        ];
    }
}
