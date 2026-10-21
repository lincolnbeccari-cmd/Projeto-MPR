<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Historico_Chamado extends Model
{
    public $table = 'historico_chamados';
    public $timestamps = false;

    protected $fillable = [
        'chamado_id',
        'usuario_id',
        'status_anterior',
        'status_novo',
        'observacao',
    ];

    public function chamado()
    {
        return $this->belongsTo(Chamado::class, 'chamado_id');
    }
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
