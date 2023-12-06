<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_commandes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quantiteVendue')->default(1);
            $table->unsignedBigInteger('commande_id');
            $table->unsignedBigInteger('frais')->default(0);
            $table->unsignedBigInteger('prixVente')->default(1);
            $table->foreign('commande_id')->references('id')->on('commandes')->cascadeOnDelete();
            $table->unsignedBigInteger('produit_id');
            $table->foreign('produit_id')->references('id')->on('produits')->cascadeOnDelete();
            $table->timestamps();
            // $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_commandes');
    }
};
