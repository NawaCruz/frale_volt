<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $table = 'compras';
    protected $primaryKey = 'id_compra';

    protected $fillable = [
        'id_user',
        'id_proveedor',
        'id_metodo_pago',
        'total',
    ];

    // RELACIONES
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'id_proveedor', 'id_proveedor');
    }

    public function metodoPago()
    {
        return $this->belongsTo(MetodoPago::class, 'id_metodo_pago', 'id_metodo_pago');
    }

    public function detalles()
    {
        return $this->hasMany(DetalleCompra::class, 'id_compra', 'id_compra');
    }

    // SCOPES (Consultas rápidas)
    // Compras por usuario
    public function scopePorUsuario($query, $idUser)
    {
        return $query->where('id_user', $idUser);
    }

    // Compras por proveedor
    public function scopePorProveedor($query, $idProveedor)
    {
        return $query->where('id_proveedor', $idProveedor);
    }

    // Compras por método de pago
    public function scopePorMetodoPago($query, $idMetodoPago)
    {
        return $query->where('id_metodo_pago', $idMetodoPago);
    }

    // Compras entre fechas
    public function scopeRangoFechas($query, $inicio, $fin)
    {
        return $query
            ->whereDate('created_at', '>=', $inicio)
            ->whereDate('created_at', '<=', $fin);
    }
}
