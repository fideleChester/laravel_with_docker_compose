<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LivraisonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Livraison::factory(10)->create();
    }
}
