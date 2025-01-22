<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('projects', function (Blueprint $table) {
        $table->renameColumn('address', 'installation_address');
    });
}

public function down()
{
    Schema::table('projects', function (Blueprint $table) {
        $table->renameColumn('installation_address', 'address');
    });
}

};
