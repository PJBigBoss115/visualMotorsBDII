<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $table = 'permisos';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['nombre', 'descripcion'];

    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'rol_permiso', 'id_permiso', 'id_rol');
    }
}
