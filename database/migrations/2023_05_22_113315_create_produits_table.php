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
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('slug')->unique();
            $table->mediumText('resume');
            $table->longText('description')->nullable();
            $table->longText('return_cancellation')->nullable();
            $table->integer('stock')->default(0);
            $table->unsignedBigInteger('cat_id');
            $table->unsignedBigInteger('vendeur_id');
            $table->string('photo');
            $table->float('prix', 10, 2)->default(0);
            $table->float('offre_prix', 10, 2)->default(0);
            $table->float('reduction')->nullable()->default(0);
            $table->float('poids');
            $table->enum('condition',['Nouveau','Par default'])->default('Par default');
            $table->enum('statut',['active','inactive'])->default('active');


            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('vendeur_id')->references('id')->on('vendeurs')->onDelete('cascade');
            $table->timestamps();
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
