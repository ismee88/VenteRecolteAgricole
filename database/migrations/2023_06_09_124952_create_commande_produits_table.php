<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('commande_produits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produit_id');
            $table->unsignedBigInteger('commande_id');
            $table->unsignedBigInteger('vendeur_id');
            $table->integer('quantite')->default(0);
            $table->enum('envoye_a_entrepot',['Oui','Non'])->default('Non');

            $table->foreign('produit_id')->references('id')->on('produits')->onDelete('CASCADE');
            $table->foreign('commande_id')->references('id')->on('commandes')->onDelete('CASCADE');
            $table->foreign('vendeur_id')->references('id')->on('vendeurs')->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commande_produits');
    }
};
