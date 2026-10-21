<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    public $table = 'categorias';
    public $timestamps = false;

    protected $fillable = [
        'nome',
        'descricao',
    ];
}
