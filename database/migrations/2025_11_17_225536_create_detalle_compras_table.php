<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detalle_compras', function (Blueprint $table) {
            $table->id('id_detalle_compra');
            $table->integer('cantidad');
            $table->decimal('precio_unitario', 10, 2);
            $table->decimal('subtotal', 10, 2);

            // Foreign keys
            $table->foreignId('id_compra')
                ->constrained('compras', 'id_compra')     // apunta a tabla compras
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreignId('id_producto')
                ->constrained('productos', 'id_producto')     // apunta a tabla productos
                ->restrictOnDelete()
                ->cascadeOnUpdate();

            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detalle_compras');
    }
};
