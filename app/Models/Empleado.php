<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['nombre', 'apellido', 'cargo', 'salario', 'fecha_contratacion', 'id_usuario'];

    public static function cargosEmpleados()
    {
        return [
            '1' => 'Supervisor',
            '2' => 'Asesor',
            '3' => 'Encargado de Area',
            '4' => 'Vendedor',
            '5' => 'RH',
            '6' => 'Contabilidad',
        ];
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function facturas()
    {
        return $this->hasMany(FacturaVenta::class, 'id');
    }

    public function asistencias()
    {
        return $this->hasMany(Asistencia::class, 'id');
    }

    public function contratos()
    {
        return $this->hasMany(Contrato::class, 'id');
    }
}
