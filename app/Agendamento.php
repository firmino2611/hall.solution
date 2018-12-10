<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    protected $table = 'agendamentos';
    protected $fillable = ['data', 'horario', 'dia', 'cliente_id', 'empresa_id', 'servico_id', 'funcionario_id'];

    public function cliente(){
        return $this->belongsTo(\App\Cliente::class);
    }

    public function empresa(){
        return $this->belongsTo(\App\Empresa::class);
    }

    public function servico(){
        return $this->belongsTo(\App\Servico::class);
    }

    public function funcionario(){
        return $this->belongsTo(\App\Funcionario::class);
    }
}
