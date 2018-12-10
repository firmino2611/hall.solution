<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Produto;
use App\Compra;

class CompraController extends Controller
{
    public function inserir(Request $request){
        return view('sistema.compra.form')
                ->with('produtos', Auth::user()->empresa->produtos)
                ->with('fornecedores', Auth::user()->empresa->fornecedores);
    }

    public function listar(){
        return view('sistema.compra.lista')
            ->with('compras', Auth::user()->empresa->compras);
    }

    public function editar(Compra $compra){
        return view('sistema.compra.form', compact('compra'))
                ->with('produtos', Auth::user()->empresa->produtos)
                ->with('clientes', Auth::user()->empresa->clientes)
                ->with('fornecedores', Auth::user()->empresa->fornecedores);
    }

    public function salvar(Request $request){
        // return $request->produtos[0]['quantidade'];
        $compra = Compra::salvar($request);

        \Session::flash('alerta', array(
            'class' =>  'success',
            'mensagem' => 'Compra salvo com sucesso!'
        ));

        return route('compra.inserir');

    }

}
