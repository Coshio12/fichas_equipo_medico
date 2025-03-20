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
        Schema::create('datos_tecnicos', function (Blueprint $table) {
            $table->id('id_datos');
            $table->unsignedBigInteger('id_equipo');
            $table->text('atributo');
            $table->text('valor');

            $table->foreign('id_equipo')->references('id_equipo')->on('equipo')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datos_tecnicos');
    }
};
