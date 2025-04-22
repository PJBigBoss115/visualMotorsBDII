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
            $table->id('id')->nullable();
            $table->string('nombre', 100)->nullable();
            $table->string('apellido', 100)->nullable();
            $table->string('cargo', 100)->nullable();
            $table->decimal('salario', 10, 2)->nullable();
            $table->date('fecha_contratacion')->nullable();
            $table->unsignedBigInteger('id_usuario')->unique()->nullable();
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
