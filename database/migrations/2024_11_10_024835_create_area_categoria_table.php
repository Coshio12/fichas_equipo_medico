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
        Schema::create('area_categoria', function (Blueprint $table) {
            $table->id('id_area_categoria');
            $table->unsignedBigInteger('id_area');
            $table->unsignedBigInteger('id_categoria');

            // Llaves foráneas
            $table->foreign('id_area')->references('id_area')->on('areas')->onDelete('cascade');
            $table->foreign('id_categoria')->references('id_categoria')->on('categorias')->onDelete('cascade');

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('areas_categoria');
    }
};
