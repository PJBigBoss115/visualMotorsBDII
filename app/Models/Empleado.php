<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';
    protected $primaryKey = 'id_empleado';
    public $timestamps = false;

    protected $fillable = ['nombre', 'apellido', 'cargo', 'salario', 'fecha_contratacion', 'id_usuario'];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function facturas()
    {
        return $this->hasMany(FacturaVenta::class, 'id_empleado');
    }

    public function asistencias()
    {
        return $this->hasMany(Asistencia::class, 'id_empleado');
    }

    public function contratos()
    {
        return $this->hasMany(Contrato::class, 'id_empleado');
    }
}
