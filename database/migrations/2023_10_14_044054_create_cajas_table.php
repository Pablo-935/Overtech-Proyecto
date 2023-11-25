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
        Schema::create('cajas', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_caja');
            $table->decimal('saldo_inicial_caja', 10, 2);
            $table->date('fecha_hs_aper_caja');
            $table->time('hs_aper_caja');
            $table->date('fecha_hs_cier_caja')->nullable();
            $table->time('hs_cier_caja')->nullable();
            $table->decimal('total_ingresos_caja', 10, 2);
            $table->decimal('total_egresos_caja', 10, 2);
            $table->decimal('total_saldo_caja', 10, 2);
            $table->string('abierta_caja', 60);
            // $table->tinyInteger('abierta_caja');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('user_cier_id')->nullable();

            // FK de tabla Empleados
            $table->foreign('user_id')->references('id')->on('users')
                            ->onDelete('cascade') //set null
                            ->onUpdate('cascade');

            $table->foreign('user_cier_id')->references('id')->on('users')
                    ->onDelete('cascade') //set null
                    ->onUpdate('cascade')
                    ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cajas');
    }
};
