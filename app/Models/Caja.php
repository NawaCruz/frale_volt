<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caja extends Model
{
    use HasFactory;

    protected $table = 'cajas';
    protected $primaryKey = 'id_caja';

    protected $fillable = [
        'id_user',
        'monto_apertura',
        'monto_total',
        'monto_cierre',
        'estado',
    ];

    // RELACIONES
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    // SCOPES ÚTILES

    // Filtrar cajas por usuario
    public function scopePorUsuario($query, $idUser)
    {
        return $query->where('id_user', $idUser);
    }

    // Filtrar cajas abiertas
    public function scopeAbiertas($query)
    {
        return $query->where('estado', 'true');
    }

    // Filtrar cajas cerradas
    public function scopeCerradas($query)
    {
        return $query->where('estado', 'false');
    }
}
