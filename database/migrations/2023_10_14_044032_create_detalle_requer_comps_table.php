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
        Schema::create('detalle_requer_compras', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad_requer_prod');
            $table->unsignedBigInteger('requerimiento_compra_id')->nullable();
            $table->unsignedBigInteger('producto_id')->nullable();

            $table->foreign('requerimiento_compra_id')->references('id')->on('requerimiento_compras')
                            ->onDelete('cascade') //set null
                            ->onUpdate('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')
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
        Schema::dropIfExists('detalle_requer_compras');
    }
};
