<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id('id_compra');

            // FKs (no estándar)
            $table->foreignId('id_user')
                ->nullable()
                ->constrained('users', 'id_user')         // users.id_user
                ->nullOnDelete();

            $table->foreignId('id_proveedor')
                ->nullable()
                ->constrained('proveedores', 'id_proveedor')    // apunta a tabla proveedores
                ->nullOnDelete()
                ->cascadeOnUpdate();

            $table->foreignId('id_metodo_pago')
                ->constrained('metodo_pagos', 'id_metodo_pago') // metodo_pagos.id_metodo_pago
                ->restrictOnDelete();

            // Negocio
            $table->decimal('total', 10, 2)->default(0);

            $table->timestamps();

            // Índices para acelerar filtros típicos
            $table->index(['id_user']);
            $table->index(['id_proveedor']);
            $table->index(['id_metodo_pago']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
