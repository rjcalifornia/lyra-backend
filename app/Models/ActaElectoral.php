<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActaElectoral extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'acta_electoral';
    protected $fillable = [
        'id_junta_receptora',
        'id_centro_votacion',
        'sobrantes',
        'inutilizados',
        'impugnados',
        'nulos',
        'abstenciones',
        'escrutados',
        'faltantes',
        'entregados',
        'id_tipo_acta',
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
        'sobrantes' => 'integer',
        'inutilizados' => 'integer',
        'impugnados' => 'integer',
        'nulos' => 'integer',
        'abstenciones' => 'integer',
        'escrutados' => 'integer',
        'entregados' => 'integer',
        'faltantes' => 'integer',
    ];

    public function idJuntaReceptora()
    {
        return $this->belongsTo(JuntasReceptoras::class, 'id_junta_receptora');
    }
    public function idCentroVotacion()
    {
        return $this->belongsTo(CentroVotacion::class, 'id_centro_votacion');
    }
    public function idTipoActa()
    {
        return $this->belongsTo(TipoActa::class, 'id_tipo_acta');
    }

    public function usuarioCrea()
    {
        return $this->belongsTo(User::class, 'usuario_crea');
    }
    public function usuarioModifica()
    {
        return $this->belongsTo(User::class, 'usuario_modifica');
    }
    public function resultados(){
        return $this->hasMany(Votos::class, 'id_acta_electoral');
    }
}
