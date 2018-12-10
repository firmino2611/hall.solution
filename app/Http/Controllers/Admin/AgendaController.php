<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AgendaController extends Controller
{
    public function inserir(Request $request){
        return view('sistema.agenda.form');
    }

    public function listar(){
        return view('sistema.cliente.lista')
            ->with('clientes', Auth::user()->empresa->clientes);
    }

    public function editar(Cliente $cliente){
        return view('sistema.cliente.form', compact('cliente'));
    }

    public function salvar(Request $request){

        $cliente = Cliente::salvar($request);

        \Session::flash('alerta', array(
            'class' =>  'success',
            'mensagem' => 'Cliente salvo com sucesso!'
        ));

        return redirect()->route('clientes.editar', $cliente->id);
    }

    public function atualizar(Request $request, Cliente $cliente){
        $cliente = Cliente::atualizar($cliente, $request);

        \Session::flash('alerta', array(
            'class' =>  'success',
            'mensagem' => 'Cliente atualizado com sucesso!'
        ));

        return redirect()->route('clientes.editar', $cliente->id);
    }
}
