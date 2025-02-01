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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('status')->default('En evaluación');
            $table->string('client_name');
            $table->string('nit');
            $table->string('email');
            $table->string('phone');
            $table->string('city');
            $table->string('department');
            $table->string('country');
            $table->string('installation_address');
            $table->text('project_description');
            $table->decimal('project_value', 15, 2);
            $table->date('start_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};