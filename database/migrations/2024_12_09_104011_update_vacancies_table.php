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
        Schema::table('vacancies', function (Blueprint $table) {

            // Voeg de nieuwe kolommen toe en maak ze nullable
            $table->string('postalcode')->nullable()->after('description');
            $table->string('housenumber')->nullable()->after('postalcode');
            $table->string('streetname')->nullable()->after('housenumber');
            $table->string('city')->nullable()->after('streetname');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vacancies', function (Blueprint $table) {
            // Herstel de kolom 'location'
            $table->string('location')->after('contract_type');

            // Verwijder de toegevoegde kolommen
            $table->dropColumn(['postalcode', 'housenumber', 'streetname', 'city']);
        });
    }
};
