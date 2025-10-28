<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodoPago extends Model
{
    use HasFactory;

    protected $table = 'metodo_pagos';
    protected $primaryKey = 'id_metodo_pago';
    public $timestamps = true;

    protected $fillable = [
        'nombre'
    ];

    /** Relaciones */
    public function ventas()
    {
        return $this->hasMany(Venta::class, 'id_metodo_pago', 'id_metodo_pago');
    }

    public function compras()
    {
        return $this->hasMany(Compra::class, 'id_metodo_pago', 'id_metodo_pago');
    }
}
