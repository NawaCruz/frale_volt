<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id('id_venta');
            $table->decimal('total', 10, 2)->default(0);
            $table->string('metodo_pago', 100); // efectivo, yape, etc.

            // Foreign keys
            $table->foreignId('id_cliente')
                ->constrained('clientes', 'id_cliente')     // apunta a tabla clientes
                ->restrictOnDelete()
                ->cascadeOnUpdate();

            $table->foreignId('id_user')
                ->constrained('users')     // apunta a tabla users
                ->restrictOnDelete()
                ->cascadeOnUpdate();

            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
