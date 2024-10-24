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
        Schema::create('notifs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_receve'); // ID de l'admin
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('type'); // Type de notification
            $table->text('data'); // Données de la notification (JSON)
            $table->boolean('is_read')->default(false); // Statut de lecture
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifs');
    }
};
