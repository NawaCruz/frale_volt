<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialCompra extends Model
{
    use HasFactory;

    protected $table = 'historial_compras';
    protected $primaryKey = 'id_historial_compras';

    protected $fillable = [
        'id_cliente',
        'id_producto',
        'cantidad',
    ];

    // relaciones
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente', 'id_cliente');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto', 'id_producto');
    }

    // SCOPES (Consultas rápidas)
    // Filtrar historial por cliente.
    public function scopePorCliente($query, $idCliente)
    {
        return $query->where('id_cliente', $idCliente);
    }

    // Filtrar historial por producto.
    public function scopePorProducto($query, $idProducto)
    {
        return $query->where('id_producto', $idProducto);
    }

    // Filtrar historial entre fechas.
    public function scopeRango($query, $inicio, $fin)
    {
        return $query
            ->whereDate('created_at', '>=', $inicio)
            ->whereDate('created_at', '<=', $fin);
    }
}
