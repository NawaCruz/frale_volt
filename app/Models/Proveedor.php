<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedores';
    protected $primaryKey = 'id_proveedor';
    public $timestamps = true;

    protected $fillable = [
        'razon_social',
        'ruc',
        'telefono',
        'correo',
        'direccion',
        'representante'
    ];

    /** Eventos del modelo cuando se elimina proveedor*/
    protected static function booted()
    {
        static::deleting(function ($proveedor) {
            // Asignar el proveedor por defecto a sus productos
            Producto::where('proveedor_id', $proveedor->id_proveedor)
                    ->update(['proveedor_id' => 1]); // 1 = “Proveedor Genérico”
        });
    }

    /** Relaciones */

    public function productos()
    {
        return $this->hasMany(Producto::class, 'id_proveedor', 'id_proveedor');
    }

    public function compras()
    {
        return $this->hasMany(Compra::class, 'id_proveedor', 'id_proveedor');
    }
}
