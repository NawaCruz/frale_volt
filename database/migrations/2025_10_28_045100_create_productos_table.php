<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id('id_producto');
            $table->string('nombre', 180);
            $table->string('descripcion')->nullable();
            $table->decimal('precio_compra', 10, 2);
            $table->decimal('precio_venta', 10, 2);
            $table->unsignedInteger('stock');

            // Relaciones (FKs)
            $table->foreignId('id_categoria')
                ->restrictOnDelete()              // no permitas borrar categoría si tiene productos
                ->constrained('categorias', 'id_categoria')     // apunta a tabla categorias
                ->cascadeOnUpdate();

            $table->foreignId('id_proveedor')
                ->nullable()
                ->constrained('proveedores', 'id_proveedor')    // apunta a tabla proveedores
                ->nullOnDelete()
                ->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};