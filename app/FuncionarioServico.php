<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FuncionarioServico extends Model
{
    protected $table = 'funcionarios_servicos';
    protected $fillable = ['funcionario_id', 'servico_id'];


}
