<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompraProduto extends Model
{
    protected $table = 'compras_produtos';
    protected $fillable = ['quantidade', 'subtotal', 'compra_id', 'produto_id'];
}
