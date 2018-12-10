<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresas';
    protected $fillable = ['nome', 'resumo', 'documento', 'pessoa'];

    /**
     * Retorna os usuarios de uma empresa
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usuarios(){
        return $this->hasMany(\App\Usuario::class);
    }

    /**
     * Retorna os funcionarios de uma empresa
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function funcionarios(){
        return $this->hasMany(\App\Usuario::class);
    }

    /**
     * Retorna os fornecedores da empresa
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fornecedores(){
        return $this->hasMany(\App\Fornecedor::class);
    }

    /**
     * Retorna os cliente da empresa
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clientes(){
        return $this->hasMany(\App\Cliente::class);
    }

    /**
     * Retorna os servicos da empresa
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function servicos(){
        return $this->hasMany(\App\Servico::class);
    }

    /**
     * Retorna os produtos de uma empresa
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function produtos(){
        return $this->hasMany(\App\Produto::class);
    }

    /**
     * Retorna os agendamento de uma empresa
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function agendamentos(){
        return $this->hasMany(\App\Agendamento::class);
    }

    public function vendas(){
        return $this->hasMany(\App\Venda::class, 'empresa_id');
    }

    public function compras(){
        return $this->hasMany(\App\Compra::class, 'empresa_id');
    }
}

