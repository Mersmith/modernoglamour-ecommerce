<?php

use App\Models\Requerimiento;
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
        Schema::create('requerimientos', function (Blueprint $table) {
            $table->id();

            $table->text('observacion')->nullable();
            $table->text('comentario')->nullable();
            $table->enum('solicitud', [Requerimiento::PENDIENTE, Requerimiento::OBSERVADO, Requerimiento::RECHAZADO, Requerimiento::APROVADO])->default(Requerimiento::PENDIENTE);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requerimientos');
    }
};
