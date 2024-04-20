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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('numero_commande',10)->unique();
            // $table->unsignedBigInteger('produit_id');
            $table->float('sous_total')->default(0);
            $table->float('montant_total')->default(0);
            $table->float('coupon')->default(0)->nullable();
            $table->string('methode_paiement')->default('cod');
            $table->enum('statut_paiement',['payé','non payé'])->default('paye');
            $table->enum('condition',["en attente",'traitement','livree','annuler'])->default('en attente');
            $table->integer('frais_de_livraison')->default(0)->nullable();
            $table->integer('quantite')->default(0);

            $table->string('nom_complet');
            $table->string('email');
            $table->string('telephone');
            $table->string('pays');
            $table->string('ville');
            $table->string('adresse');
            $table->string('etat');
            $table->integer('code_postal');
            $table->mediumText('note')->nullable();

            $table->string('snom_complet');
            $table->string('semail');
            $table->string('stelephone');
            $table->string('spays');
            $table->string('sville');
            $table->string('sadresse');
            $table->string('setat');
            $table->integer('scode_postal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
