<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $fillable = [  'nome', 'email', 'estado', 'cidade', 'bairro', 'rua', 'numero', 'complemento', 'empresa_id',];

    /**
     * Retorna a empresa que o cliente pertence
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function empresa(){
        return $this->belongsTo(\App\Empresa::class);
    }

    public static function salvar($request){
        $cliente = Cliente::create($request->all());

        return $cliente;
    }

    public static function atualizar($cliente, $request){
        $cliente->update($request->all());
        return $cliente;
    }

    public function agendamentos(){
        return $this->hasMany(\App\Agendamento::class);
    }

    public function vendas(){
        return $this->hasMany(\App\Venda::class, 'cliente_id');
    }
}
