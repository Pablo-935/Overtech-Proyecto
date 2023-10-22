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
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->integer('num_comp');
            $table->decimal('monto_comp', 10, 2);
            $table->date('fecha_comp');
            $table->time('hora_comp');

            $table->unsignedBigInteger('caja_id')->nullable();
            $table->unsignedBigInteger('proveedor_id')->nullable();
            $table->unsignedBigInteger('requerimiento_compra_id')->nullable();

            $table->foreign('caja_id')->references('id')->on('cajas')
                            ->onDelete('cascade') //set null
                            ->onUpdate('cascade');
            $table->foreign('proveedor_id')->references('id')->on('proveedores')
                            ->onDelete('cascade') //set null
                            ->onUpdate('cascade');
            $table->foreign('requerimiento_compra_id')->references('id')->on('requerimiento_compras')
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
        Schema::dropIfExists('compras');
    }
};
