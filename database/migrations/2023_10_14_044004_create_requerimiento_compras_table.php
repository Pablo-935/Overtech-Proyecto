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
        Schema::create('requerimiento_compras', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_requer_comp');
            $table->string('estado_requer_comp', 60);

            $table->unsignedBigInteger('user_id')->nullable();

            // FK de Empleado
            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::dropIfExists('requerimiento_compras');
    }
};
