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
        Schema::create('facturas_ventas', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('id_cliente')->nullable();
            $table->unsignedBigInteger('id_empleado')->nullable();
            $table->date('fecha')->nullable();
            $table->decimal('total', 10, 2)->nullable();
            $table->enum('tipo_pago', ['Efectivo', 'Tarjeta', 'Transferencia'])->nullable();
            $table->timestamps();
        
            $table->foreign('id_cliente')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('id_empleado')->references('id')->on('empleados')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas_ventas');
    }
};
