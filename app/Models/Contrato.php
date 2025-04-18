<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $table = 'contratos';
    protected $primaryKey = 'id_contrato';
    public $timestamps = false;

    protected $fillable = ['tipo', 'fecha_inicio', 'fecha_fin', 'id_empleado'];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id_empleado');
    }
}
