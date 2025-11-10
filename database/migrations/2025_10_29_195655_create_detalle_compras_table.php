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

            $table->foreignId('id_compra')
                ->constrained('compras', 'id_compra')
                ->cascadeOnDelete(); // si eliminas la compra, caen sus detalles

            $table->foreignId('id_producto')
                ->constrained('productos', 'id_producto')
                ->restrictOnDelete()
                ->cascadeOnUpdate();

            $table->integer('cantidad');
            $table->decimal('precio_unitario', 10, 2);
            $table->decimal('subtotal', 10, 2);

            $table->timestamps();

            // Índices prácticos
            $table->index(['id_compra', 'id_producto']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detalle_compras');
    }
};
