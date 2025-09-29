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
        Schema::create('servicios', function (Blueprint $table) {
            $table->id('id_servicio');
            $table->dateTime('fecha_recepcion');
            $table->text('descripcion_problema');
            $table->unsignedBigInteger('id_estado_servicio');
            $table->text('diagnostico_servicio')->nullable();
            $table->text('solucion_servicio')->nullable();
            $table->unsignedBigInteger('id_tecnico');
            $table->unsignedBigInteger('id_equipo');
            $table->unsignedBigInteger('id_cliente');
            $table->dateTime('fecha_entrega')->nullable();
            $table->timestamps();

            // Foreign keys
            $table->foreign('id_estado_servicio')->references('id_estado_servicio')->on('estado_servicios')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('id_tecnico')->references('id_tecnico')->on('tecnicos')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('id_equipo')->references('id_equipo')->on('equipos')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('id_cliente')->references('id_cliente')->on('clientes')->onDelete('restrict')->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicios');
    }
};
