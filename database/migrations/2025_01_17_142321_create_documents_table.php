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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nombre del documento
            $table->string('path'); // Ruta del archivo
            $table->string('mime_type')->nullable(); // Tipo MIME del archivo
            $table->bigInteger('size')->nullable(); // Tamaño del archivo en bytes
            $table->foreignId('project_id')->constrained()->onDelete('cascade'); // Relación con proyectos
            $table->foreignId('stage_id')->nullable()->constrained()->onDelete('cascade'); // Relación con etapas (opcional)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
