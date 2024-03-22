<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CentroVotacion extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'centro_votacion';

    protected $fillable = [
        'nombre',
        'id_distrito',
        'cantidad_mesas_votacion',
        'activo',
        'usuario_crea',
        'usuario_modifica'
    ];

    public function idDistrito()
    {
        return $this->belongsTo(Distritos::class, 'id_distrito');
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
