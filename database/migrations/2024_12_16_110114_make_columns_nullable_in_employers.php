<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('employers', function (Blueprint $table) {
            $table->string('city')->nullable()->change();
            $table->string('address')->nullable()->change();
            $table->string('zip_code')->nullable()->change();
            $table->string('sector')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employers', function (Blueprint $table) {
            $table->string('city')->nullable(false)->change();
            $table->string('address')->nullable(false)->change();
            $table->string('zip_code')->nullable(false)->change();
            $table->string('sector')->nullable(false)->change();
        });
    }
};
