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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id('id_empleado');
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->string('cargo', 100);
            $table->decimal('salario', 10, 2);
            $table->date('fecha_contratacion');
            $table->unsignedBigInteger('id_usuario')->unique();
            $table->timestamps();
        
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
