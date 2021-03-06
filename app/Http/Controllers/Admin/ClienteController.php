<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Cliente;

class ClienteController extends Controller
{
    public function inserir(Request $request){
        return view('sistema.cliente.form');
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

        if($cliente instanceof Cliente){
            \Session::flash('alerta', array(
                'class' =>  'success',
                'mensagem' => 'Cliente salvo com sucesso!'
            ));
            return redirect()->route('clientes.editar', $cliente->id);
        }

        \Session::flash('alerta', array(
            'class' =>  'danger',
            'mensagem' => 'Cliente ja existe.'
        ));

        return redirect()->route('clientes.inserir');
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
