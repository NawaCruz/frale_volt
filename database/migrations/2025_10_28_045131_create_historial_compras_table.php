<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('historial_compras', function (Blueprint $table) {
            $table->id('id_historial_compras'); // PK

            // FKs según tu convención: id_cliente / id_producto
            $table->foreignId('id_cliente')
                    ->constrained('clientes', 'id_cliente')
                    ->restrictOnDelete()   // no permitas borrar cliente si tiene historial
                    ->cascadeOnUpdate();

            $table->foreignId('id_producto')
                    ->constrained('productos', 'id_producto')
                    ->restrictOnDelete()   // idem para producto
                    ->cascadeOnUpdate();

            $table->unsignedInteger('cantidad')->default(1);

            $table->timestamps(); // created_at / updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('historial_compras');
    }
};
