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
        Schema::create('detail_produits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_produit'); // Doit être unsignedBigInteger
            $table->text('description');
            $table->text('composant');
            $table->date('date_creation')->nullable();
            $table->foreign('id_produit')->references('id')->on('produits')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_produits');
    }
};
