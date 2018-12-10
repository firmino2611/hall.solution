<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Fornecedor;
use Illuminate\Support\Facades\Auth;

class FornecedorController extends Controller
{
    public function inserir(Request $request){
        return view('sistema.fornecedor.form');
    }

    public function listar(){
        return view('sistema.fornecedor.lista')
            ->with('fornecedores', Auth::user()->empresa->fornecedores);
    }

    public function editar(Fornecedor $fornecedor){
        return view('sistema.fornecedor.form', compact('fornecedor'));
    }

    public function salvar(Request $request){
        $fornecedor = Fornecedor::create(array(
            'nome' => $request->nome,
            'empresa_id' => Auth::user()->empresa->id
        ));

        \Session::flash('alerta', array(
            'class' =>  'success',
            'mensagem' => 'Fornecedor salvo com sucesso!'
        ));

        return redirect()->route('fornecedores.editar', $fornecedor->id);
    }

    public function atualizar(Request $request, Fornecedor $fornecedor){
        $fornecedor->update(array(
            'nome' => $request->nome,
            'empresa_id' => Auth::user()->empresa->id
        ));

        \Session::flash('alerta', array(
            'class' =>  'success',
            'mensagem' => 'Fornecedor atualizado com sucesso!'
        ));

        return redirect()->route('fornecedores.editar', $fornecedor->id);
    }
}
