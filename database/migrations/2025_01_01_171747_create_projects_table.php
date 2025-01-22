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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            
            // Ejemplo de columnas que necesitas (ajusta según tu caso):
            $table->string('name');
            $table->string('client_name');
            $table->string('nit');
            $table->string('email');
            $table->string('phone');
            $table->string('city');
            $table->string('installation_address');
            $table->text('project_description');
            $table->decimal('project_value', 15, 2); // Ajusta precisión y escala
            $table->date('start_date')->nullable();

            // Rutas de documentos (todas nullable)
            $table->string('rut_path')->nullable();
            $table->string('chamber_of_commerce_path')->nullable();
            $table->string('financial_statements_path')->nullable();
            $table->string('legal_representative_id_path')->nullable();
            $table->string('credit_request_path')->nullable();
            $table->string('project_information_path')->nullable();
            $table->string('approval_query_path')->nullable();

            // Estado del proyecto
            $table->string('status');

            // Relación con usuarios (asumiendo que existe la tabla 'users')
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Timestamps: created_at, updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
