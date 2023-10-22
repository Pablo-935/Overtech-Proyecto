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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->integer('dni_empl');
            $table->string('nombre_empl', 60);
            $table->string('apellido_empl', 60);
            $table->string('celular_empl')->nullable();
            $table->string('correo_empl', 100);
            $table->string('domicilio_empl', 100);
            $table->string('tipo_empl', 60);
            $table->date('fecha_alta_empl');
            $table->date('fecha_baja_empl')->nullable();

            $table->unsignedBigInteger('user_id')->nullable();
            
            $table->foreign('user_id')->references('id')->on('users')
                            ->onDelete('cascade')  //Set null ->una vez ya probado
                            ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
