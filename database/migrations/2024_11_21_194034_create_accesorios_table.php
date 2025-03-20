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
        Schema::create('accesorios', function (Blueprint $table) {
            $table->id('id_accesorio');
            $table->text('nombre_accesorio');
            $table->text('descripcion_accesorio');
            $table->text('feature');

            $table->unsignedBigInteger('id_equipo');

            $table->foreign('id_equipo')->references('id_equipo')->on('equipo')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accesorios');
    }
};
