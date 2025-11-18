<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $table = 'ventas';
    protected $primaryKey = 'id_venta';

    protected $fillable = [
        'id_cliente',
        'id_user',
        'fecha_venta',
        'total',
        'metodo_pago',
    ];

    // RELACIONES
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente', 'id_cliente');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function metodoPago()
    {
        return $this->belongsTo(MetodoPago::class, 'metodo_pago', 'id_metodo_pago');
    }

    public function detalles()
    {
        return $this->hasMany(DetalleVenta::class, 'id_venta', 'id_venta');
    }

    // SCOPES (consultas rápidas)
    // Ventas por cliente
    public function scopePorCliente($query, $idCliente)
    {
        return $query->where('id_cliente', $idCliente);
    }

    // Ventas por usuario
    public function scopePorUsuario($query, $idUser)
    {
        return $query->where('id_user', $idUser);
    }

    // Ventas por método de pago
    public function scopePorMetodoPago($query, $metodo)
    {
        return $query->where('metodo_pago', $metodo);
    }

    // Ventas entre fechas
    public function scopeRangoFechas($query, $inicio, $fin)
    {
        return $query
            ->whereDate('fecha_venta', '>=', $inicio)
            ->whereDate('fecha_venta', '<=', $fin);
    }
}
