<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartidoTipoEleccion extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'partido_tipo_eleccion';
    protected $fillable = [
        'id_partido',
        'id_tipo_acta',
        'municipio_id',
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

    public function idPartido()
    {
        return $this->belongsTo(PartidosPoliticos::class, 'id_partido');
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
}
