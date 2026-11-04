<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Usuario;

class AdminToken extends Model
{
    protected $table = 'admin_token';

    protected $fillable = [
        'usuario_id',
        'nivel_acesso',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
