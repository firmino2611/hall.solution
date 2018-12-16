<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class ConfiguracaoController extends Controller
{
    public function editar(){
        if(Auth::user()->hasRole('admin')){
            return view('sistema.usuario.form');
        }else if(Auth::user()->hasRole('master')){

        }else{
            return view('sistema.funcionario.form')
                ->with('funcionario', Auth::user());
        }
    }
}
