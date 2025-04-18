<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'id_cliente';
    public $timestamps = false;

    protected $fillable = ['nombre', 'correo', 'telefono'];

    public function facturas()
    {
        return $this->hasMany(FacturaVenta::class, 'id_cliente');
    }
}
