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
            // Añadir solo las columnas que faltan.
            // Verifica si cada columna existe antes de intentar añadirla.

            if (!Schema::hasColumn('projects', 'client_name')) {
                $table->string('client_name')->after('name');
            }
            if (!Schema::hasColumn('projects', 'address')) {
                $table->string('address')->after('city');
            }
            if (!Schema::hasColumn('projects', 'project_description')) {
                $table->text('project_description')->after('address');
            }
            if (!Schema::hasColumn('projects', 'project_value')) {
                $table->decimal('project_value', 15, 2)->after('project_description'); // Ajusta la precisión y escala según tus necesidades
            }
            if (!Schema::hasColumn('projects', 'start_date')) {
                $table->date('start_date')->after('project_value')->nullable(); // Mantener como nullable
            }
            if (!Schema::hasColumn('projects', 'rut_path')) {
                $table->string('rut_path')->nullable()->after('start_date');
            }
            if (!Schema::hasColumn('projects', 'chamber_of_commerce_path')) {
                $table->string('chamber_of_commerce_path')->nullable()->after('rut_path');
            }
            if (!Schema::hasColumn('projects', 'financial_statements_path')) {
                $table->string('financial_statements_path')->nullable()->after('chamber_of_commerce_path');
            }
            if (!Schema::hasColumn('projects', 'legal_representative_id_path')) {
                $table->string('legal_representative_id_path')->nullable()->after('financial_statements_path');
            }
            if (!Schema::hasColumn('projects', 'credit_request_path')) {
                $table->string('credit_request_path')->nullable()->after('legal_representative_id_path');
            }
            if (!Schema::hasColumn('projects', 'project_information_path')) {
                $table->string('project_information_path')->nullable()->after('credit_request_path');
            }
            if (!Schema::hasColumn('projects', 'approval_query_path')) {
                $table->string('approval_query_path')->nullable()->after('project_information_path');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn([
                'client_name',
                'address',
                'project_description',
                'project_value',
                'start_date',
                'rut_path',
                'chamber_of_commerce_path',
                'financial_statements_path',
                'legal_representative_id_path',
                'credit_request_path',
                'project_information_path',
                'approval_query_path',
            ]);
        });
    }
};