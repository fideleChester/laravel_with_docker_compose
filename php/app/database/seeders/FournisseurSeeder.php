<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FournisseurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Fournisseur::factory(1)->create();
    }
}
