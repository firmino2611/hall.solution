<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Venda;
use App\VendaProduto;
use App\Produto;

class VendaController extends Controller
{
    public function inserir(Request $request){
        return view('sistema.venda.form')
                ->with('produtos', Auth::user()->empresa->produtos)
                ->with('clientes', Auth::user()->empresa->clientes);
    }

    public function listar(){
        return view('sistema.venda.lista')
            ->with('vendas', Auth::user()->empresa->vendas);
    }

    public function editar(Venda $venda){
        return view('sistema.venda.form', compact('venda'))
                ->with('produtos', Auth::user()->empresa->produtos)
                ->with('clientes', Auth::user()->empresa->clientes);
    }

    public function salvar(Request $request){
        // return $request->produtos[0]['quantidade'];
        $venda = Venda::salvar($request);

        \Session::flash('alerta', array(
            'class' =>  'success',
            'mensagem' => 'Venda salvo com sucesso!'
        ));

        return route('venda.inserir');

    }

    public function atualizar(Request $request, Venda $venda){
        
    }
}
