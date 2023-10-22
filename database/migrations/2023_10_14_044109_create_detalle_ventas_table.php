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
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad_prod_venta');
            $table->decimal('sub_total_det_venta', 10, 2);
            $table->timestamps();

            $table->unsignedBigInteger('venta_id')->nullable();
            $table->unsignedBigInteger('producto_id')->nullable();

            $table->foreign('venta_id')->references('id')->on('ventas')
                            ->onDelete('cascade') //Set null
                            ->onUpdate('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')
                            ->onDelete('cascade') //set null
                            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_ventas');
    }
};
