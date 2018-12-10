<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/login', ['as'=>'login', 'uses'=>'Admin\UsuarioController@login']);
Route::post('/autenticar', ['as'=>'autenticar', 'uses'=>'Admin\UsuarioController@autenticar']);

Route::group(['prefix'=>'admin', 'middleware' => 'auth'], function(){
	
	Route::get('/', ['as'=>'admin.index', 'uses'=>'Admin\UsuarioController@index']);
	Route::get('/logout', ['as'=>'admin.logout', 'uses'=>'Admin\UsuarioController@logout']);

	Route::group(['prefix' => 'fornecedores'], function(){
	    Route::get('inserir-novo', 'Admin\FornecedorController@inserir')->name('fornecedores.inserir');
	    Route::get('listar', 'Admin\FornecedorController@listar')->name('fornecedores.listar');
	    Route::get('{fornecedor}/editar', 'Admin\FornecedorController@editar')->name('fornecedores.editar');
	    Route::put('{fornecedor}/atualizar', 'Admin\FornecedorController@atualizar')->name('fornecedores.atualizar');
	    Route::post('/salvar', 'Admin\FornecedorController@salvar')->name('fornecedores.salvar');
    });

	Route::group(['prefix' => 'funcionarios'], function (){
        Route::get('inserir-novo', 'Admin\FuncionarioController@inserir')->name('funcionarios.inserir');
        Route::get('listar', 'Admin\FuncionarioController@listar')->name('funcionarios.listar');
        Route::get('{funcionario}/editar', 'Admin\FuncionarioController@editar')->name('funcionarios.editar');
        Route::put('{funcionario}/atualizar', 'Admin\FuncionarioController@atualizar')->name('funcionarios.atualizar');
        Route::post('/salvar', 'Admin\FuncionarioController@salvar')->name('funcionarios.salvar');
        Route::post('/horarios/salvar', 'Admin\FuncionarioController@atribuirHorario')->name('funcionarios.horario.salvar');
        Route::post('/horarios/excluir', 'Admin\FuncionarioController@excluirHorario')->name('funcionarios.horario.excluir');
    });

    Route::group(['prefix' => 'clientes'], function (){
        Route::get('inserir-novo', 'Admin\ClienteController@inserir')->name('clientes.inserir');
        Route::get('listar', 'Admin\ClienteController@listar')->name('clientes.listar');
        Route::get('{cliente}/editar', 'Admin\ClienteController@editar')->name('clientes.editar');
        Route::put('{cliente}/atualizar', 'Admin\ClienteController@atualizar')->name('clientes.atualizar');
        Route::post('/salvar', 'Admin\ClienteController@salvar')->name('clientes.salvar');
    });

    Route::group(['prefix' => 'servico'], function (){
        Route::get('inserir-novo', 'Admin\ServicoController@inserir')->name('servicos.inserir');
        Route::get('listar', 'Admin\ServicoController@listar')->name('servicos.listar');
        Route::get('{servico}/editar', 'Admin\ServicoController@editar')->name('servicos.editar');
        Route::put('{servico}/atualizar', 'Admin\ServicoController@atualizar')->name('servicos.atualizar');
        Route::post('/salvar', 'Admin\ServicoController@salvar')->name('servicos.salvar');
    });

    Route::group(['prefix' => 'produtos'], function (){
        Route::get('inserir-novo', 'Admin\ProdutoController@inserir')->name('produtos.inserir');
        Route::get('listar', 'Admin\ProdutoController@listar')->name('produtos.listar');
        Route::get('{produto}/editar', 'Admin\ProdutoController@editar')->name('produtos.editar');
        Route::put('{produto}/atualizar', 'Admin\ProdutoController@atualizar')->name('produtos.atualizar');
        Route::post('/salvar', 'Admin\ProdutoController@salvar')->name('produtos.salvar');
    });

    Route::group(['prefix' => 'agendamentos'], function (){
        Route::get('inserir-novo', 'Admin\AgendaController@inserir')->name('agenda.inserir');
        Route::get('listar', 'Admin\AgendaController@listar')->name('agenda.listar');
        Route::get('{agendamento}/editar', 'Admin\AgendaController@editar')->name('agenda.editar');
        Route::put('{agendamento}/atualizar', 'Admin\AgendaController@atualizar')->name('agenda.atualizar');
        Route::post('/salvar', 'Admin\AgendaController@salvar')->name('agenda.salvar');
    });

    Route::group(['prefix' => 'vendas'], function (){
        Route::get('inserir-novo', 'Admin\VendaController@inserir')->name('venda.inserir');
        Route::get('listar', 'Admin\VendaController@listar')->name('venda.listar');
        Route::get('{venda}/editar', 'Admin\VendaController@editar')->name('venda.editar');
        Route::put('{venda}/atualizar', 'Admin\VendaController@atualizar')->name('venda.atualizar');
        Route::post('/salvar', 'Admin\VendaController@salvar')->name('venda.salvar');
    });

    Route::group(['prefix' => 'compras'], function (){
        Route::get('inserir-novo', 'Admin\CompraController@inserir')->name('compra.inserir');
        Route::get('listar', 'Admin\CompraController@listar')->name('compra.listar');
        Route::get('{compra}/editar', 'Admin\CompraController@editar')->name('compra.editar');
        Route::put('{compra}/atualizar', 'Admin\CompraController@atualizar')->name('compra.atualizar');
        Route::post('/salvar', 'Admin\CompraController@salvar')->name('compra.salvar');
    });
});



