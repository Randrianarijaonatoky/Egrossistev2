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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('id_produit');
            $table->string('nom');
            $table->string('prenom');
            $table->string('contact');
            $table->string('nom_produits');
            $table->string('quantite');
            $table->string('prix');
            $table->string('image');
            $table->string('date_de_livraison');
            $table->string('lieu');
            $table->string('localisation');
            $table->string('frais_de_livraison');
            $table->string('heurre');
            $table->string('statut');
            $table->string('montant_a_paye');
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

