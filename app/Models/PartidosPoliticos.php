<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartidosPoliticos extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'partidos_politicos';
    protected $fillable = [
        'nombre',
        'siglas',
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


    public function usuarioCrea()
    {
        return $this->belongsTo(User::class, 'usuario_crea');
    }
    public function usuarioModifica()
    {
        return $this->belongsTo(User::class, 'usuario_modifica');
    }
}
