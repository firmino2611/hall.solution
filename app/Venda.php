<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Produto;

class Venda extends Model
{
    protected $table = 'vendas';
    protected $fillable = ['data', 'quantidade', 'valor', 'cliente_id', 'empresa_id'];

    public function empresa(){
        return $this->belongsTo(\App\Empresa::class, 'empresa_id');
    }

    public function cliente(){
        return $this->belongsTo(\App\Cliente::class, 'cliente_id');
    }

    public function produtos(){
        return $this->belongsToMany(\App\Produto::class, 'vendas_produtos', 'venda_id', 'produto_id')
                ->withPivot('subtotal', 'quantidade');
    }

    public static function salvar($request){
        $valor = function($request){
            $total = 0;
            foreach($request['produtos'] as $produto)
                $total += $produto['quantidade'] * Produto::find($produto['id'])->preco;
            return $total;
        };

        $qtde = function($request){
            $total = 0;
            foreach($request->produtos as $produto)
                $total += $produto['quantidade'];
            return $total;
        };

        $venda = Venda::create(array(
            'empresa_id' => $request->empresa,
            'valor' => $valor($request),
            'data' => $request->data ?? \Carbon\Carbon::now(),
            'quantidade' => $qtde($request),
            'cliente_id' => $request->cliente
        ));

        foreach ($request->produtos as $key => $produto) {
            $prod = Produto::find($produto['id']);
            $prod->estoque = $prod->estoque > 0 ? $prod->estoque - $produto['quantidade'] : 0;
            $prod->save();

            VendaProduto::create(array(
                'venda_id' => $venda->id,
                'produto_id' => $produto['id'],
                'quantidade' => $produto['quantidade'],
                'subtotal' => $produto['quantidade'] * $prod->preco
            ));
        }

        return $venda;
    }
}
