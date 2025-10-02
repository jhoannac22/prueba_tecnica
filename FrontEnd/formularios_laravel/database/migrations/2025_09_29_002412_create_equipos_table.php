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
        Schema::create('equipos', function (Blueprint $table) {
            $table->id('id_equipo');

            // Relaciones
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_tipo_equipo');
            $table->unsignedBigInteger('id_marca');
            $table->unsignedBigInteger('id_tecnico')->nullable();

            // Datos del equipo
            $table->string('modelo', 100)->nullable();
            $table->string('serie', 100)->unique();
            $table->text('descripcion')->nullable();

            $table->timestamps();

            // Claves foráneas
            $table->foreign('id_cliente')->references('id_cliente')->on('clientes')->onDelete('cascade');
            $table->foreign('id_tipo_equipo')->references('id_tipo_equipo')->on('tipo_equipos')->onDelete('cascade');
            $table->foreign('id_marca')->references('id_marca')->on('marcas')->onDelete('cascade');
            $table->foreign('id_tecnico')->references('id_tecnico')->on('tecnicos')->onDelete('set null');
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};
