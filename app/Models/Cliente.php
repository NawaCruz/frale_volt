<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';
    protected $primaryKey = 'id_cliente';
    public $timestamps = true;
    /**
     * Campos que pueden asignarse de forma masiva (fillable).
     */
    protected $fillable = [
        'dni',
        'nombre',
        'apellido',
        'correo',
        'telefono',
        'direccion'
    ];
    /** Relaciones con otras tablas (si luego las tienes). */
    public function ventas()
    {
        return $this->hasMany(Venta::class, 'id_cliente', 'id_cliente');
    }

    public function historialCompras()
    {
        return $this->hasMany(HistorialCompra::class, 'id_cliente', 'id_cliente');
    }

    public function segmentacionClientes()
    {
        return $this->hasMany(SegmentacionCliente::class, 'id_cliente', 'id_cliente');
    }
}
