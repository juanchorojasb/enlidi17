<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('documents', function (Blueprint $table) {
            // Agregar la columna 'project_id' si no existe
            if (!Schema::hasColumn('documents', 'project_id')) {
                $table->unsignedBigInteger('project_id')->after('id');
            }

            // Agregar la clave foránea para 'project_id'
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');

            // Eliminar la columna 'path' si existe
            if (Schema::hasColumn('documents', 'path')) {
                $table->dropColumn('path');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('documents', function (Blueprint $table) {
            // Eliminar la clave foránea primero
            if (Schema::hasColumn('documents', 'project_id')) {
                $table->dropForeign(['project_id']);
            }

            // Eliminar la columna 'project_id' si existe
            if (Schema::hasColumn('documents', 'project_id')) {
                $table->dropColumn('project_id');
            }
            // Si se necesita revertir la eliminación de 'path', recrearla aquí
            // $table->string('path')->after('name')->nullable();
        });
    }
};