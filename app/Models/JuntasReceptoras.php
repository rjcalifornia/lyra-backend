<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JuntasReceptoras extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'junta_receptora_votos';
    protected $fillable = [
        'correlativo',
        'id_centro_votacion',
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
    ];

    public function idCentroVotacion()
    {
        return $this->belongsTo(CentroVotacion::class, 'id_centro_votacion');
    }
}
