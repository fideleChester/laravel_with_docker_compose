<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DetailCommandeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\DetailCommande::factory(10)->create();
    }
}
