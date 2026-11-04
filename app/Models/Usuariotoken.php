<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuariotoken extends Model
{
    protected $table = 'usuario_token';

    protected $fillable = [
        'usuario_id',
        'token',
        'valido_ate',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
