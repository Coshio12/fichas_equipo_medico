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
        Schema::create('documentacion', function (Blueprint $table) {
            $table->id('id_documentacion');
            $table->text('nombre_documento');
            $table->string('tipo_documento');
            $table->text('feature_pdf');

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
        Schema::dropIfExists('documentacion');
    }
};
