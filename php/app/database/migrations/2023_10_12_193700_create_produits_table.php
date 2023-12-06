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
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('photo')->default('product2.jpg');
            $table->string('libelle')->unique();
            $table->string('unite')->default('piece');
            $table->string('description')->nullable();
            // $table->unsignedBigInteger('prixVente')->default(1);
            $table->unsignedBigInteger('quantite')->default(0);
            $table->timestamps();
            $table->unsignedBigInteger('categorie_id');
            $table->foreign('categorie_id')->references('id')->on('categories')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
