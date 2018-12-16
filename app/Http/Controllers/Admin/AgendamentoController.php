<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Agendamento;

class AgendamentoController extends Controller
{
    public function inserir(Request $request){
        return view('sistema.agendamento.form');
    }

    public function listar(){
        // return  Auth::user()->empresa->agendamentos;
        return view('sistema.agendamento.lista')
            ->with('agendas', Auth::user()->empresa->agendamentos()->orderBy('id', 'desc')->get());
    }

    public function editar(Cliente $agenda){
        return view('sistema.agenda.form', compact('agenda'));
    }

    public function salvar(Request $request){
        // return $request->all();

        $agenda = Agendamento::salvar($request);

        \Session::flash('alerta', array(
            'class' =>  'success',
            'mensagem' => 'Agendamento salvo com sucesso!'
        ));

        return redirect()->route('agendamento.listar');
    }

    public function atualizar(Request $request, Cliente $agenda){
        $agenda = Cliente::atualizar($agenda, $request);

        \Session::flash('alerta', array(
            'class' =>  'success',
            'mensagem' => 'Cliente atualizado com sucesso!'
        ));

        return redirect()->route('agendas.editar', $agenda->id);
    }
}
