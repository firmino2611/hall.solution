<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = 'horarios';
    protected $fillable = ['inicio', 'inicio_almoco', 'fim_almoco', 'fim', 'dia', 'funcionario_id'];

    public function funcionario(){
        return $this->belongsTo(\App\Funcionario::class);
    }
}
