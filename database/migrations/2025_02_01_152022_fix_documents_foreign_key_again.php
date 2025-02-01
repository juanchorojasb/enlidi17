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
            // Intentar eliminar la clave foránea (por si existe con un nombre diferente)
            try {
                $table->dropForeign('documents_project_id_foreign');
            } catch (\Exception $e) {
                Log::warning("No se pudo eliminar la clave foránea 'documents_project_id_foreign'. Puede que no exista o tenga otro nombre. Detalles: " . $e->getMessage());
            }

            //Si la columna `project_id` no existe, la creamos
            if (!Schema::hasColumn('documents', 'project_id')) {
                $table->unsignedBigInteger('project_id')->after('size');
            }

            // Agregar la clave foránea para 'project_id'
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
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
            // Eliminar la clave foránea
            $table->dropForeign(['project_id']);

            // Eliminar la columna project_id
            if (Schema::hasColumn('documents', 'project_id')) {
                $table->dropColumn('project_id');
            }
        });
    }
};