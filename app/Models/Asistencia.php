<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $table = 'asistencias';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['fecha', 'hora_entrada', 'hora_salida', 'id_empleado'];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id');
    }
}
