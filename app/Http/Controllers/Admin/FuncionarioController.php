<?php

namespace App\Http\Controllers\Admin;

use App\Horario;
use App\Usuario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Funcionario;

class FuncionarioController extends Controller
{
    public function inserir(Request $request){
        return view('sistema.funcionario.form');
    }

    public function listar(){
        return view('sistema.funcionario.lista')
            ->with('funcionarios', Auth::user()->empresa->funcionarios);
    }

    public function editar(Usuario $funcionario){
        return view('sistema.funcionario.form', compact('funcionario'));
    }

    public function salvar(Request $request){
        $u = Usuario::where('email', $request->email)->get();
        if(count($u)){
            \Session::flash('alerta', array(
                'class' =>  'danger',
                'mensagem' => 'Funcionário ja existe com esse email ' . $request->email 
            ));
            return redirect()->route('funcionarios.inserir');
        }
        $usuario = Usuario::salvar($request);

        \Session::flash('alerta', array(
            'class' =>  'success',
            'mensagem' => 'Funcionário salvo com sucesso!'
        ));

        return redirect()->route('funcionarios.editar', $usuario->id);
    }

    public function atualizar(Request $request, Usuario $funcionario){
        Usuario::atualizar($funcionario, $request);

        \Session::flash('alerta', array(
            'class' =>  'success',
            'mensagem' => 'Funcionário atualizado com sucesso!'
        ));

        return redirect()->route('funcionarios.editar', $funcionario->id);
    }

    public function atribuirHorario(Request $request){
        //return $request->all();
        $horario = Horario::create($request->all());

        \Session::flash('alerta', array(
            'class' =>  'success',
            'mensagem' => 'Horário atribuido com sucesso!'
        ));

        return redirect()->route('funcionarios.editar', $horario->funcionario->usuario->id);
    }

    public function excluirHorario(Request $request){
        $horario = Horario::find($request->id);
        $horario->delete();
    }
}
