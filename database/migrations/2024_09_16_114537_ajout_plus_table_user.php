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
        Schema::table('users', function (Blueprint $table) {
            //
            // Ajouter la colonne google_id de type string et nullable
            $table->string('google_id')->nullable()->after('email');

            // Modifier la colonne password pour qu'elle soit nullable
            $table->string('password')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            // Supprimer la colonne google_id
            $table->dropColumn('google_id');

            // Remettre la colonne password à non nullable si besoin
            $table->string('password')->nullable(false)->change();
        });
    }
};
