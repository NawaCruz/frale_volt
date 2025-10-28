<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id('id_cliente');                          // PK
            $table->string('dni', 12)->unique();
            $table->string('nombre', 120)->nullable();
            $table->string('apellido', 120)->nullable();
            $table->string('correo', 190)->nullable()->unique();
            $table->string('telefono', 30)->nullable();
            $table->string('direccion', 255)->nullable();

            $table->timestamps(); // created_at y updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};