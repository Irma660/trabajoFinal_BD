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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('producto_id'); // Referencia al ID del producto
            $table->string('producto_nombre');
            $table->integer('cantidad');
            $table->date('fecha_venta');
            $table->decimal('precio_unitario', 10, 2); // 10 dígitos, 2 decimales
            $table->timestamps();
            // Establece la relación con la tabla de productos
            $table->foreign('producto_id')->references('id')->on('productos');
        });   
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
