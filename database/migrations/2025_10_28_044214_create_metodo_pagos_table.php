<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('metodo_pagos', function (Blueprint $table) {
            $table->id('id_metodo_pago'); // PK personalizada
            $table->string('nombre')->unique();
            $table->timestamps(); // created_at y updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('metodo_pagos');
    }
};
