<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $table = 'contratos';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['tipo', 'fecha_inicio', 'fecha_fin', 'id_empleado'];

    public static function tiposContratos()
    {
        return [
            '1' => 'Parcial',
            '2' => 'Indefinido',
        ];
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id');
    }
}
