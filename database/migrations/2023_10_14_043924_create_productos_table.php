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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_prod', 60);
            $table->string('nombre_prod', 60);
            $table->text('descripcion_prod');
            $table->decimal('precio_uni_prod', 10, 2);
            $table->integer('stock_min_prod');
            $table->integer('stock_actual_prod');
            $table->integer('stock_max_prod');
            $table->string('imagen_prod', 100);
            $table->unsignedBigInteger('categoria_id')->nullable();

            // FK de Categoria
            $table->foreign('categoria_id')->references('id')->on('categoria_productos')
                            ->onDelete('cascade') //Set null
                            ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
