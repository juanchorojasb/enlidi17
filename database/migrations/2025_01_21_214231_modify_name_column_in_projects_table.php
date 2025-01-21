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
        Schema::table('projects', function (Blueprint $table) {
            // Hacer 'name' nullable
            $table->string('name')->nullable()->change();

            // O, alternativamente, asignar un valor por defecto:
            // $table->string('name')->default('Proyecto sin nombre')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // Revertir a NOT NULL si es necesario, o ajustar según el estado original
            $table->string('name')->nullable(false)->change();
        });
    }
};