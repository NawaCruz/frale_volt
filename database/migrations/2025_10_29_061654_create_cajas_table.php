<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cajas', function (Blueprint $table) {
            // PK no estándar
            $table->id('id_caja');

            // FK hacia users.id_user (no users.id)
            $table->foreignId('id_user')
                ->nullable()
                ->constrained('users', 'id_user')
                ->nullOnDelete();

            // Campos de negocio
            $table->decimal('monto_apertura', 10, 2)->default(0);
            $table->decimal('monto_total', 10, 2)->default(0);
            $table->decimal('monto_cierre', 10, 2)->nullable()->default(0);
            $table->string('estado', 20)->default('abierta'); // 'abierta' | 'cerrada'

            $table->timestamps();

            // Índices que los ordena para buscar las consultas SQL más rápido
            $table->index(['id_user', 'estado']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cajas');
    }
};
