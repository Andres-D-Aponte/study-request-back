<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidato_id')->constrained('candidatos')->onDelete('cascade');
            $table->foreignId('tipo_estudio_id')->constrained('tipo_estudios')->onDelete('cascade');
            $table->enum('estado', ['pendiente', 'en_proceso', 'completado'])->default('pendiente');
            $table->date('fecha_solicitud');
            $table->timestamp('fecha_completado')->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('solicitudes');
    }
};
