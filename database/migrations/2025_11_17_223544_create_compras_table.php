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
            $table->decimal('total', 10, 2)->default(0);

            $table->foreignId('id_user')
                ->constrained('users')     // apunta a tabla users
                ->restrictOnDelete()
                ->cascadeOnUpdate();

            $table->foreignId('id_proveedor')
                ->constrained('proveedores', 'id_proveedor')     // apunta a tabla proveedores
                ->restrictOnDelete()
                ->cascadeOnUpdate();

            $table->foreignId('id_metodo_pago')
                ->constrained('metodo_pagos', 'id_metodo_pago')     // apunta a tabla metodo_pagos
                ->restrictOnDelete()
                ->cascadeOnUpdate();

            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
