<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\FuncionarioServico;

class Funcionario extends Model
{
    protected $table = 'funcionarios';
    protected $fillable = ['usuario_id'];

    /**
     * Retorna o usuario do funcionario
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario(){
        return $this->belongsTo(\App\Usuario::class);
    }

    /**
     * Retorna os servico que um funcionario pode fazer
     */
    public function servicos(){
        return $this->belongsToMany(\App\Servico::class, 'funcionarios_servicos');
    }

    /**
     * Retorna os agendamento de um funcionario
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function agendamentos(){
        return $this->hasMany(\App\Agendamento::class);
    }

    public function horarios(){
        return $this->hasMany(\App\Horario::class);
    }

    public function fazServico($servico){
        foreach($this->servicos as $serv){
            if($servico->id == $serv->id)
                return true;
        }
        return false;
    }
}
