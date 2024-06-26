<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolPermiso extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rol_permiso';

    protected $fillable = [
        'id_rol',
        'id_permiso',
        'activo',
        'usuario_crea',
        'usuario_modifica',
    ];

}
