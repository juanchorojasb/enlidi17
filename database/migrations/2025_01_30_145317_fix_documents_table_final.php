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
            // Eliminar la clave foránea si existe
            $table->dropForeign(['project_id']);

            // Eliminar columnas incorrectas si existen
            $columnsToDrop = ['path', 'document_path'];
            foreach ($columnsToDrop as $column) {
                if (Schema::hasColumn('documents', $column)) {
                    $table->dropColumn($column);
                }
            }

            // Agregar la columna 'id' como clave primaria auto-incremental si no existe.
            if (!Schema::hasColumn('documents', 'id')) {
                $table->bigIncrements('id')->first(); // Añadir como primera columna
            }

            // Agregar la columna 'file_path' si no existe.
            if (!Schema::hasColumn('documents', 'file_path')) {
                $table->string('file_path')->after('name');
            }

            // Agregar la columna 'mime_type' si no existe.
            if (!Schema::hasColumn('documents', 'mime_type')) {
                $table->string('mime_type')->after('file_path');
            }

            // Agregar la columna 'size' si no existe.
            if (!Schema::hasColumn('documents', 'size')) {
                $table->integer('size')->after('mime_type');
            }

            // Verificar si la columna 'project_id' existe
            if (!Schema::hasColumn('documents', 'project_id')) {
                // Si no existe, agregar la columna 'project_id'
                $table->unsignedBigInteger('project_id')->after('size');
            }
            
            // Asegurarse de que 'stage_id' permita valores NULL, si existe.
            if (Schema::hasColumn('documents', 'stage_id')) {
                $table->unsignedBigInteger('stage_id')->nullable()->change();
            }

            // Agregar timestamps si no existen.
            if (!Schema::hasColumn('documents', 'created_at')) {
                $table->timestamps();
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
            // Eliminar la clave foránea si existe
            $sm = Schema::getConnection()->getSchemaManager();
            $foreignKeys = $sm->listTableForeignKeys('documents');

            $projectForeignKeyExists = collect($foreignKeys)->contains(function ($key) {
                return $key->getName() == 'documents_project_id_foreign' && $key->getLocalColumns()[0] == 'project_id';
            });

            if ($projectForeignKeyExists) {
                $table->dropForeign('documents_project_id_foreign');
            }

            // Eliminar las columnas si existen
            $columnsToDrop = ['id', 'file_path', 'mime_type', 'size', 'project_id', 'stage_id', 'created_at', 'updated_at'];
            foreach ($columnsToDrop as $column) {
                if (Schema::hasColumn('documents', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
