<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'id_user';
    public $incrementing = true;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // relaciones
        public function cajas()
    {
        return $this->hasMany(Caja::class, 'id_user', 'id_user');
    }

    public function ventas()
    {
        return $this->hasMany(Venta::class, 'id_user', 'id_user');
    }

    public function compras()
    {
        return $this->hasMany(Compra::class, 'id_user', 'id_user');
    }
}
