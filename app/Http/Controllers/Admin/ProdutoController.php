<?php

namespace App\Http\Controllers\Admin;

use App\Produto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProdutoController extends Controller
{
    public function inserir(Request $request){
        return view('sistema.produto.form');
    }

    public function listar(){
        return view('sistema.produto.lista')
            ->with('produtos', Auth::user()->empresa->produtos);
    }

    public function editar(Produto $produto){
        return view('sistema.produto.form', compact('produto'));
    }

    public function salvar(Request $request){
        //return $request->all();
        $produto = Produto::salvar($request);

        \Session::flash('alerta', array(
            'class' =>  'success',
            'mensagem' => 'Produto salvo com sucesso!'
        ));

        return redirect()->route('produtos.editar', $produto->id);
    }

    public function atualizar(Request $request, Produto $produto){
        $produto = Produto::atualizar($produto, $request);

        \Session::flash('alerta', array(
            'class' =>  'success',
            'mensagem' => 'Produto atualizado com sucesso!'
        ));

        return redirect()->route('produtos.editar', $produto->id);
    }
}
