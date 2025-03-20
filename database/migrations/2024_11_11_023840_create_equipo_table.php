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
        Schema::create('equipo', function (Blueprint $table) {
            $table->id('id_equipo');
            $table->string('nombre_equipo');
            $table->string('codigo_activo');
            $table->string('codigo_biomedica');
            $table->text('servicio_equipo');
            $table->text('dependencia_equipo');
            $table->string('marca_equipo');
            $table->string('modelo_equipo');
            $table->string('numero_serie');
            $table->text('descripcion_equipo');
            $table->text('observacion_equipo');
            $table->string('feature');

            $table->date('fecha_adquisicion');
            $table->date('fecha_funcionamiento');
            $table->string('frecuencia_uso');
            $table->string('frecuencia_mantenimiento');
            $table->string('estado_equipo');
            $table->integer('garantia_equipo');

            $table->unsignedBigInteger('id_categoria');
            $table->unsignedBigInteger('id_proveedor');

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');


            $table->foreign('id_categoria')->references('id_categoria')->on('categorias')->onDelete('cascade');

            $table->foreign('id_proveedor')->references('id_proveedor')->on('proveedor')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipo');

        Schema::table('equipo', function (Blueprint $table) {
            $table->dropForeign(['updated_by']);
            $table->dropColumn('updated_by');
        });
    }
};
