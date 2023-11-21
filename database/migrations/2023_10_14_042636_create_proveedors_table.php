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
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_prov', 60);
            $table->string('telefono_prov', 100)->nullable();
            $table->string('direccion_prov', 100)->nullable();
            $table->string('ubicacion_prov', 100)->nullable();
            $table->string('correo_prov', 100);
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
         Schema::table('proveedores', function (Blueprint $table) {
            $table->dropSoftDeletes(); // Esto elimina la columna "deleted_at" de la tabla
        });
        Schema::dropIfExists('proveedores');

        
    }
};
