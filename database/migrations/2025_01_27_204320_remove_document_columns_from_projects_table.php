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
        Schema::table('projects', function (Blueprint $table) {
            // Eliminar las columnas de documentos si existen
            if (Schema::hasColumn('projects', 'rut_path')) {
                $table->dropColumn('rut_path');
            }
            if (Schema::hasColumn('projects', 'chamber_of_commerce_path')) {
                $table->dropColumn('chamber_of_commerce_path');
            }
            if (Schema::hasColumn('projects', 'financial_statements_path')) {
                $table->dropColumn('financial_statements_path');
            }
            if (Schema::hasColumn('projects', 'legal_representative_id_path')) {
                $table->dropColumn('legal_representative_id_path');
            }
            if (Schema::hasColumn('projects', 'credit_request_path')) {
                $table->dropColumn('credit_request_path');
            }
            if (Schema::hasColumn('projects', 'project_information_path')) {
                $table->dropColumn('project_information_path');
            }
            if (Schema::hasColumn('projects', 'approval_query_path')) {
                $table->dropColumn('approval_query_path');
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
        Schema::table('projects', function (Blueprint $table) {
            // No es necesario recrear estas columnas en el rollback
            // ya que se gestionan en la tabla 'documents'
        });
    }
};