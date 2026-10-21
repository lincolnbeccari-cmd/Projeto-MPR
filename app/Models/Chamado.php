<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chamado extends Model
{
    public $table = 'chamados';
    public $timestamps = false;

    protected $fillable = [
        'titulo',
        'descricao',
        'status',
        'usuario_id',
        'categoria_id',
    ];
}
