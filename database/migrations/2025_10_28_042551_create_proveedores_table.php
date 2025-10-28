<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id('id_proveedor'); // PK personalizada

            $table->string('razon_social')->comment('Nombre o razón social');
            $table->string('ruc', 15)->unique()->comment('Número de RUC del proveedor');
            $table->string('telefono', 30)->nullable();
            $table->string('correo', 190)->nullable()->unique();
            $table->string('direccion', 255)->nullable();
            $table->string('representante', 120)->nullable()->comment('Persona de contacto');
            $table->timestamps(); // created_at y updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('proveedores');
    }
};
