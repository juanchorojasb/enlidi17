<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMissingColumnsToTables extends Migration
{
    public function up()
    {
        // 1) Tabla 'projects'
        Schema::table('projects', function (Blueprint $table) {
            // user_id para relacionar con la tabla users
            if (!Schema::hasColumn('projects', 'user_id')) {
                $table->unsignedBigInteger('user_id')->nullable()->after('id');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            }
        });

        // 2) Tabla 'documents'
        Schema::table('documents', function (Blueprint $table) {
            // Relación con projects
            if (!Schema::hasColumn('documents', 'project_id')) {
                $table->unsignedBigInteger('project_id')->nullable()->after('id');
                $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            }
            // Campos para guardar info de los documentos
            if (!Schema::hasColumn('documents', 'name')) {
                $table->string('name')->nullable()->after('project_id');
            }
            if (!Schema::hasColumn('documents', 'file_path')) {
                $table->string('file_path')->nullable()->after('name');
            }
            if (!Schema::hasColumn('documents', 'mime_type')) {
                $table->string('mime_type')->nullable()->after('file_path');
            }
            if (!Schema::hasColumn('documents', 'size')) {
                $table->unsignedBigInteger('size')->nullable()->after('mime_type');
            }
        });

        // 3) Tabla 'stages'
        Schema::table('stages', function (Blueprint $table) {
            // Relación con projects
            if (!Schema::hasColumn('stages', 'project_id')) {
                $table->unsignedBigInteger('project_id')->nullable()->after('id');
                $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            }
            // Campos básicos que sueles usar
            if (!Schema::hasColumn('stages', 'name')) {
                $table->string('name')->nullable()->after('project_id');
            }
            if (!Schema::hasColumn('stages', 'status')) {
                $table->string('status')->nullable()->after('name');
            }
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            if (Schema::hasColumn('projects', 'client_name')) {
                $table->dropColumn('client_name');
            }
            if (Schema::hasColumn('projects', 'address')) {
                $table->dropColumn('address');
            }
            if (Schema::hasColumn('projects', 'project_description')) {
                $table->dropColumn('project_description');
            }
            if (Schema::hasColumn('projects', 'project_value')) {
                $table->dropColumn('project_value');
            }
            if (Schema::hasColumn('projects', 'start_date')) {
                $table->dropColumn('start_date');
            }
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
    
    

}
