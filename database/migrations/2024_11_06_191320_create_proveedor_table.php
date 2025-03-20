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
        Schema::create('proveedor', function (Blueprint $table) {
            $table->id('id_proveedor');
            $table->text('nombre_empresa');
            $table->string('nombre_proveedor');
            $table->text('direccion_proveedor');
            $table->string('contacto_proveedor');
            $table->string('email_proveedor');


            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');

            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedor');

        Schema::table('proveedor', function (Blueprint $table) {
            $table->dropForeign(['updated_by']);
            $table->dropColumn('updated_by');
        });
    }
};
