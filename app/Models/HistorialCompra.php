<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialCompra extends Model
{
    use HasFactory;

    protected $table = 'historial_compras';
    protected $primaryKey = 'id_historial_compras';
    public $timestamps = true;

    protected $fillable = [
        'id_cliente',
        'id_producto',
        'cantidad',
    ];

    protected $casts = [
        'cantidad'   => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Muchos a uno: cada historial pertenece a un cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente', 'id_cliente');
    }

    // Muchos a uno: cada historial pertenece a un producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto', 'id_producto');
    }
}
