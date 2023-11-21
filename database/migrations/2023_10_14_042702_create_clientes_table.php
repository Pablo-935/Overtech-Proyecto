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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('cuit_cli', 13);
            $table->string('nombre_cli', 60);
            $table->string('celular_cli')->nullable();
            $table->timestamps();

            // Añadiendo Soft Deletes
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         // Quitar Soft Deletes
         Schema::table('clientes', function (Blueprint $table) {
            $table->dropSoftDeletes(); // Esto elimina la columna "deleted_at" de la tabla
        });
        
        Schema::dropIfExists('clientes');

        
    }
};
