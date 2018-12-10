<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendaProduto extends Model
{
    protected $table = 'vendas_produtos';
    protected $fillable = ['quantidade', 'subtotal', 'venda_id', 'produto_id'];
}
