<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispositivos extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'dispositivos';
    protected $fillable = [
        'id_usuario',
        'id_centro_votacion',
        'codigo_autorizacion',
        'validado',
        'activo',
        'usuario_crea',
        'usuario_modifica'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'activo' => 'boolean',
        'validado' => 'boolean',
    ];

    public function idUsuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function idCentroVotacion()
    {
        return $this->belongsTo(CentroVotacion::class, 'id_centro_votacion');
    }

    public function usuarioCrea()
    {
        return $this->belongsTo(User::class, 'usuario_crea');
    }
    public function usuarioModifica()
    {
        return $this->belongsTo(User::class, 'usuario_modifica');
    }
}
