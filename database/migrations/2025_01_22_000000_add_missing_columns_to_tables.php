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

    public function down()
    {
        // Invierte los cambios (si lo deseas).
        Schema::table('projects', function (Blueprint $table) {
            if (Schema::hasColumn('projects', 'user_id')) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            }
        });

        Schema::table('documents', function (Blueprint $table) {
            if (Schema::hasColumn('documents', 'project_id')) {
                $table->dropForeign(['project_id']);
                $table->dropColumn('project_id');
            }
            if (Schema::hasColumn('documents', 'name')) {
                $table->dropColumn('name');
            }
            if (Schema::hasColumn('documents', 'file_path')) {
                $table->dropColumn('file_path');
            }
            if (Schema::hasColumn('documents', 'mime_type')) {
                $table->dropColumn('mime_type');
            }
            if (Schema::hasColumn('documents', 'size')) {
                $table->dropColumn('size');
            }
        });

        Schema::table('stages', function (Blueprint $table) {
            if (Schema::hasColumn('stages', 'project_id')) {
                $table->dropForeign(['project_id']);
                $table->dropColumn('project_id');
            }
            if (Schema::hasColumn('stages', 'name')) {
                $table->dropColumn('name');
            }
            if (Schema::hasColumn('stages', 'status')) {
                $table->dropColumn('status');
            }
        });
    }
}
