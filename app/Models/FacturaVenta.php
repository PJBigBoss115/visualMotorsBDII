<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacturaVenta extends Model
{
    protected $table = 'facturas_ventas';
    protected $primaryKey = 'id_factura';
    public $timestamps = false;

    protected $fillable = ['id_cliente', 'id_empleado', 'fecha', 'total', 'tipo_pago'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id_empleado');
    }
}
