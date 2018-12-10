<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Produto;

class Compra extends Model
{
    protected $table = 'compras';
    protected $fillable = ['data', 'quantidade', 'valor', 'fornecedor_id', 'empresa_id'];

    public function empresa(){
        return $this->belongsTo(\App\Empresa::class, 'empresa_id');
    }

    public function fornecedor(){
        return $this->belongsTo(\App\Fornecedor::class, 'fornecedor_id');
    }

    public function produtos(){
        return $this->belongsToMany(\App\Produto::class, 'compras_produtos', 'compra_id', 'produto_id')
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

        $compra = Compra::create(array(
            'empresa_id' => $request->empresa,
            'valor' => $valor($request),
            'data' => $request->data ?? \Carbon\Carbon::now(),
            'quantidade' => $qtde($request),
            'fornecedor_id' => $request->fornecedor
        ));

        foreach ($request->produtos as $key => $produto) {
            $prod = Produto::find($produto['id']);
            $prod->estoque += $produto['quantidade'];
            $prod->save();

            CompraProduto::create(array(
                'compra_id' => $compra->id,
                'produto_id' => $produto['id'],
                'quantidade' => $produto['quantidade'],
                'subtotal' => $produto['quantidade'] * $prod->preco
            ));
        }

        return $compra;
    }
}
