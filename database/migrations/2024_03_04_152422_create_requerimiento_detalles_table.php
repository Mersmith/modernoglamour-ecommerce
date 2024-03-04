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
        Schema::create('requerimiento_detalles', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('requerimiento_id');
            $table->unsignedBigInteger('variacion_id');

            $table->integer('cantidad');

            $table->foreign('requerimiento_id')->references('id')->on('requerimientos')->onDelete('cascade');
            $table->foreign('variacion_id')->references('id')->on('variacions')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requerimiento_detalles');
    }
};
