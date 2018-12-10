<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';
    protected $fillable = ['nome', 'descricao', 'preco', 'empresa_id', 'estoque'];

    public function empresa(){
        return $this->belongsTo(\App\Empresa::class);
    }

    public static function salvar($request){
        $request->preco = str_replace(',', '.', $request->preco);
        $servico = Produto::create($request->all());
        return $servico;
    }

    public static function atualizar($produto, $request){
        $request->preco = str_replace(',', '.', $request->preco);
        $produto->update($request->all());
        return $produto;
    }

    public function vendas(){
        return $this->belongsToMany(\App\Venda::class, 'vendas_produtos', 'produto_id', 'venda_id');
    }

    public function compras(){
        return $this->belongsToMany(\App\Compra::class, 'compras_produtos', 'produto_id', 'compra_id');
    }
}
