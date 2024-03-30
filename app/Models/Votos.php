<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Votos extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'votos';
    protected $fillable = [
        'id_partido',
        'id_acta_electoral',
        'votos',
        'usuario_crea',
        'usuario_modifica'
    ];

    public function idPartido()
    {
        return $this->belongsTo(PartidosPoliticos::class, 'id_partido');
    }

    public function idActaElectoral()
    {
        return $this->belongsTo(ActaElectoral::class, 'id_acta_electoral');
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
