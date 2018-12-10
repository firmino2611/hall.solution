<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Servico;

class ServicoController extends Controller
{
    public function inserir(Request $request){
        return view('sistema.servico.form');
    }

    public function listar(){
        return view('sistema.servico.lista')
            ->with('servicos', Auth::user()->empresa->servicos);
    }

    public function editar(Servico $servico){
        return view('sistema.servico.form', compact('servico'));
    }

    public function salvar(Request $request){
        //return $request->all();
        $servico = Servico::salvar($request);

        \Session::flash('alerta', array(
            'class' =>  'success',
            'mensagem' => 'Serviço salvo com sucesso!'
        ));

        return redirect()->route('servicos.editar', $servico->id);
    }

    public function atualizar(Request $request, Servico $servico){
        $servico = Servico::atualizar($servico, $request);

        \Session::flash('alerta', array(
            'class' =>  'success',
            'mensagem' => 'Serviço atualizado com sucesso!'
        ));

        return redirect()->route('servicos.editar', $servico->id);
    }
}
