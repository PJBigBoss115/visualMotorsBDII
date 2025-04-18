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
        Schema::create('asistencias', function (Blueprint $table) {
            $table->id('id_asistencia');
            $table->date('fecha');
            $table->time('hora_entrada');
            $table->time('hora_salida');
            $table->unsignedBigInteger('id_empleado');
            $table->timestamps();
        
            $table->foreign('id_empleado')->references('id_empleado')->on('empleados')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asistencias');
    }
};
