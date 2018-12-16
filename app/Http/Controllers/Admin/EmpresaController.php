<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Empresa;

class EmpresaController extends Controller
{
    public function inserir(Request $request){
        return view('sistema.empresa.form');
    }

    public function listar(){
        return view('sistema.empresa.lista')
            ->with('empresas', Auth::user()->empresa->empresas);
    }

    public function editar(Empresa $empresa){
        return view('sistema.usuario.form', compact('empresa'));
    }

    public function salvar(Request $request){

        $empresa = Empresa::create($request->all());

        \Session::flash('alerta', array(
            'class' =>  'success',
            'mensagem' => 'Empresa salvo com sucesso!'
        ));
        return redirect()->route('empresas.editar', $empresa->id);

    }

    public function atualizar(Request $request, Empresa $empresa){
        $empresa->update($request->all());

        \Session::flash('alerta', array(
            'class' =>  'success',
            'mensagem' => 'Empresa atualizado com sucesso!'
        ));

        return redirect()->route('empresas.editar', $empresa->id);
    }
}
