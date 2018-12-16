<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    protected $table = 'fornecedores';
    protected $fillable = ['nome', 'empresa_id', 'cnpj'];

    public function empresa(){
        return $this->belongsTo(\App\Empresa::class);
    }

    public function compras(){
        return $this->hasMany(\App\Compra::class, 'fornecedor_id');
    }
}
