<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Agendamento extends Model
{
    protected $table = 'agendamentos';
    protected $fillable = ['data', 'horario', 'dia', 'cliente_id', 'empresa_id', 'servico_id', 'funcionario_id'];
    private static $dias = ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'];

    public function cliente(){
        return $this->belongsTo(\App\Cliente::class);
    }

    public function empresa(){
        return $this->belongsTo(\App\Empresa::class, 'empresa_id');
    }

    public function servico(){
        return $this->belongsTo(\App\Servico::class);
    }

    public function funcionario(){
        return $this->belongsTo(\App\Funcionario::class);
    }

    public static function salvar($request){
        $dia = Agendamento::$dias[(new Carbon($request->data))->dayOfWeek];
        $agendamento = Agendamento::create(array(
            'dia' => $dia,
            'horario' => $request->horario,
            'data' => $request->data,
            'cliente_id' => $request->cliente_id,
            'empresa_id' => $request->empresa_id,
            'funcionario_id' => $request->funcionario_id,
            'servico_id' => $request->servico_id,
        ));
        return $agendamento;
    }
}
