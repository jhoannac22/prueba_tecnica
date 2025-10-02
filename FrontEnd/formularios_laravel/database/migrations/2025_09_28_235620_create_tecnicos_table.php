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
        Schema::create('tecnicos', function (Blueprint $table) {
            $table->id('id_tecnico');
            $table->string('primer_nombre', 30);
            $table->string('segundo_nombre', 30)->nullable();
            $table->string('primer_apellido', 30);
            $table->string('segundo_apellido', 30)->nullable();
            $table->string('especialidad', 100)->nullable();
            $table->string('telefono', 20);
            $table->string('email', 80)->unique();
            $table->timestamps();

            $table->index('telefono', 'idx_tecnico_telefono');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tecnicos');
    }
};
