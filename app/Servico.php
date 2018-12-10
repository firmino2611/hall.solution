<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    protected $table = 'servicos';
    protected $fillable = ['nome', 'descricao', 'preco', 'duracao', 'empresa_id'];

    /**
     * Retorna os funcionarios que fazem um determinado servico
     */
    public function funcionarios(){
        return $this->belongsToMany(\App\Funcionario::class, 'funcionarios_servicos');
    }

    /**
     * Retorna os dados da empresa que fazem um determinado servico
     */
    public function empresa(){
        return $this->belongsTo(\App\Empresa::class);
    }

    /**
     * Retorna os agendamento de um servico
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function agendamentos(){
        return $this->hasMany(\App\Agendamento::class);
    }

    public static function salvar($request){
        $request->preco = str_replace(',', '.', $request->preco);
        $servico = Servico::create($request->all());

        foreach ($request->funcionarios as $funcionario){
            FuncionarioServico::create(array(
                'funcionario_id' => $funcionario,
                'servico_id' => $servico->id
            ));
        }
        return $servico;
    }

    public static function atualizar($servico, $request){
        $request->preco = str_replace(',', '.', $request->preco);
        $servico->update($request->all());
        FuncionarioServico::where('servico_id', $servico->id)->delete();

        foreach ($request->funcionarios as $funcionario){
            FuncionarioServico::create(array(
                'funcionario_id' => $funcionario,
                'servico_id' => $servico->id
            ));
        }
        return $servico;
    }
}
