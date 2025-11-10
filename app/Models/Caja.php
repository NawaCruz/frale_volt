<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caja extends Model
{
    use HasFactory;

    protected $table = 'cajas';
    protected $primaryKey = 'id_caja';
    public $incrementing = true;

    protected $fillable = [
        'id_user',
        'monto_apertura',
        'monto_total',
        'monto_cierre',
        'estado',
    ];

    /**
     * Conversiones automáticas de tipo
     */
    protected $casts = [
        'monto_apertura' => 'decimal:2',
        'monto_total'    => 'decimal:2',
        'monto_cierre'   => 'decimal:2',
        'created_at'     => 'datetime',
        'updated_at'     => 'datetime',
    ];

    // Relación 1:M inversa con User
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
