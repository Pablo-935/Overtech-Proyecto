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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->integer('dni_venta');
            $table->date('fecha_venta');
            $table->time('hora_venta');
            $table->decimal('total_venta', 10, 2);
            $table->string('estado_venta', 60);

            $table->unsignedBigInteger('empleado_id')->nullable();
            $table->unsignedBigInteger('caja_id')->nullable();
            $table->unsignedBigInteger('cliente_id')->nullable();

            $table->foreign('empleado_id')->references('id')->on('empleados')
                            ->onDelete('cascade') // set null
                            ->onUpdate('cascade');
            $table->foreign('caja_id')->references('id')->on('cajas')
                            ->onDelete('cascade') // set null
                            ->onUpdate('cascade');
            $table->foreign('cliente_id')->references('id')->on('clientes')
                        ->onDelete('cascade') //set null
                        ->onUpdate('cascade');
            $table->timestamps();
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
