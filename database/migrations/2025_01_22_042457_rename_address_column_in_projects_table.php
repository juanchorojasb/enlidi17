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
        if (Schema::hasColumn('projects', 'address')) {
            $table->renameColumn('address', 'installation_address');
        }
    });
}

public function down(): void
{
    Schema::table('projects', function (Blueprint $table) {
        if (Schema::hasColumn('projects', 'installation_address')) {
            $table->renameColumn('installation_address', 'address');
        }
    });
}


};
