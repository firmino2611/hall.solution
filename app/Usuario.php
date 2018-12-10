<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Kodeine\Acl\Traits\HasRole;
use Illuminate\Support\Facades\Auth;

class Usuario extends Authenticatable
{
    use Notifiable, HasRole;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'email', 'senha', 'empresa_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
         'remember_token',
    ];

    /**
     * Retorna a empresa que o usuario faz parte
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function empresa(){
        return $this->belongsTo(\App\Empresa::class, 'empresa_id');
    }

    /**
     * Retorna o funcionario do usuario
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function funcionario(){
        return $this->hasOne(\App\Funcionario::class);
    }

    public static function salvar($request){
        $usuario = Usuario::create(array(
            'nome' => $request->nome,
            'email' => $request->email,
            'senha' => bcrypt($request->senha),
            'empresa_id' => Auth::user()->empresa->id
        ));
        $usuario->funcionario()->create(array(
            'usuario_id' => $usuario->id,
        ));

        return $usuario;
    }

    public static function atualizar($funcionario, $request){
        $funcionario->update(array(
            'nome' => $request->nome,
            'email' => $request->email,
        ));
        return $funcionario;
    }
}
