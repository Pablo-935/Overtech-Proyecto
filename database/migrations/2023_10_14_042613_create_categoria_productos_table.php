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
        Schema::create('categoria_productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_cat', 60);
            $table->text('descripcion_cat'); 
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
        Schema::table('categoria_productos', function (Blueprint $table) {
            $table->dropSoftDeletes(); // Esto elimina la columna "deleted_at" de la tabla
        });
        
        Schema::dropIfExists('categoria_productos');
          // Quitar Soft Deletes
         
    }
};
