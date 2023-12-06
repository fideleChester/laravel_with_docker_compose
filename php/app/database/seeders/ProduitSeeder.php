<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Produit::factory(20)->create();
    }
}
