<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('empresas', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
		    $table->increments('id');
		    $table->string('nome', 150);
		    $table->text('resumo')->nullable();
		    $table->string('documento', 45);
		    $table->enum('pessoa', ["fisica",  "huridica"])->nullable();
		    
		    $table->timestamps();
		
		});

		Schema::table('usuarios', function(Blueprint $table) {
		    $table->integer('empresa_id')->unsigned();
		
		    $table->index('empresa_id','fk_usuarios_empresas1_idx');
		
		    $table->foreign('empresa_id')
		        ->references('id')->on('empresas')
		        ->onDelete('cascade');
		
		});

		Schema::create('clientes', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
		    $table->increments('id');
		    $table->string('nome', 255);
		    $table->string('email', 191);
		    $table->string('estado', 2)->nullable();
		    $table->string('cidade', 100)->nullable();
		    $table->string('bairro', 100)->nullable();
		    $table->string('rua', 150)->nullable();
		    $table->string('numero', 45)->nullable();
		    $table->string('complemento', 45)->nullable();
		    $table->integer('empresa_id')->unsigned();
		    
		    
		
		    $table->unique('email','email_unique');
		
		    $table->index('empresa_id','fk_clientes_empresas1_idx');
		
		    $table->foreign('empresa_id')
		        ->references('id')->on('empresas')
		        ->onDelete('cascade');
		
		    $table->timestamps();
		
		});

		Schema::create('funcionarios', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
		    $table->increments('id');
		    $table->integer('usuario_id')->unsigned();
		
		    $table->index('usuario_id','fk_funcionarios_usuarios_idx');
		
		    $table->foreign('usuario_id')
		        ->references('id')->on('usuarios')
		        ->onDelete('cascade');
		
		    $table->timestamps();
		
		});

		Schema::create('fornecedores', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
		    $table->increments('id');
		    $table->string('nome', 100)->nullable();
		    $table->integer('empresa_id')->unsigned();
		    
		    
		
		    $table->index('empresa_id','fk_fornecedores_empresas1_idx');
		
		    $table->foreign('empresa_id')
		        ->references('id')->on('empresas')
		        ->onDelete('cascade');
		
		    $table->timestamps();
		
		});

		Schema::create('servicos', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
		    $table->increments('id');
		    $table->string('nome', 100);
		    $table->text('descricao')->nullable();
		    $table->decimal('preco', 10, 2)->default(0);
		    $table->time('duracao')->nullable();
		    $table->integer('empresa_id')->unsigned();
		    
		    
		
		    $table->index('empresa_id','fk_servicos_empresas1_idx');
		
		    $table->foreign('empresa_id')
		        ->references('id')->on('empresas')
		        ->onDelete('cascade');
		
		    $table->timestamps();
		
		});

		Schema::create('funcionarios_servicos', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
		    $table->integer('funcionario_id')->unsigned();
		    $table->integer('servico_id')->unsigned();
		    
		    $table->primary('funcionario_id', 'servico_id');
		
		    $table->index('servico_id','fk_funcionarios_has_servicos_servicos1_idx');
		    $table->index('funcionario_id','fk_funcionarios_has_servicos_funcionarios1_idx');
		
		    $table->foreign('funcionario_id')
		        ->references('id')->on('funcionarios')->onDelete('cascade');
		
		    $table->foreign('servico_id')
		        ->references('id')->on('servicos')->onDelete('cascade');
		
		    $table->timestamps();
		
		});

		Schema::create('agendamentos', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
		    $table->increments('id');
		    $table->date('data');
		    $table->time('horario');
		    $table->string('dia', 3)->nullable();
		    $table->string('agendamentoscol', 45)->nullable();
		    $table->integer('empresa_id')->unsigned();
		    $table->integer('servico_id')->unsigned();
		    $table->integer('funcionario_id')->unsigned();
		    $table->integer('cliente_id')->unsigned();
		    
		    
		
		    $table->index('empresa_id','fk_agendamentos_empresas1_idx');
		    $table->index('servico_id','fk_agendamentos_servicos1_idx');
		    $table->index('funcionario_id','fk_agendamentos_funcionarios1_idx');
		    $table->index('cliente_id','fk_agendamentos_clientes1_idx');
		
		    $table->foreign('empresa_id')
		        ->references('id')->on('empresas')
		        ->onDelete('cascade');
		
		    $table->foreign('servico_id')
		        ->references('id')->on('servicos')
		        ->onDelete('cascade');
		
		    $table->foreign('funcionario_id')
		        ->references('id')->on('funcionarios')
		        ->onDelete('cascade');
		
		    $table->foreign('cliente_id')
		        ->references('id')->on('clientes')
		        ->onDelete('cascade');
		
		    $table->timestamps();
		
		});

		Schema::create('produtos', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
		    $table->increments('id');
		    $table->string('nome', 255);
		    $table->text('descricao')->nullable();
		    $table->decimal('preco', 10, 2)->default(0);
		    $table->integer('empresa_id')->unsigned();
		    
		    
		
		    $table->index('empresa_id','fk_produtos_empresas1_idx');
		
		    $table->foreign('empresa_id')
		        ->references('id')->on('empresas')
		        ->onDelete('cascade');
		
		    $table->timestamps();
		
		});

		Schema::create('vendas', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
		    $table->increments('id');
		    $table->date('data');
		    $table->decimal('valor', 10, 2)->default(0);
		    $table->decimal('quantidade', 10, 2)->default(0);
		    $table->integer('empresa_id')->unsigned();
		    $table->integer('cliente_id')->unsigned();
		    
		    
		
		    $table->index('empresa_id','fk_vendas_empresas1_idx');
		    $table->index('cliente_id','fk_vendas_clientes1_idx');
		
		    $table->foreign('empresa_id')
		        ->references('id')->on('empresas')
		        ->onDelete('cascade');
		
		    $table->foreign('cliente_id')
		        ->references('id')->on('clientes')
		        ->onDelete('cascade');
		
		    $table->timestamps();
		
		});

		Schema::create('vendas_produtos', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
		    $table->integer('venda_id')->unsigned();
		    $table->integer('produto_id')->unsigned();
		    $table->decimal('subtotal', 10, 2)->nullable()->default(0);
		    $table->decimal('quantidade', 10, 2)->nullable()->default(0);
		    
		    $table->primary('venda_id', 'produto_id');
		
		    $table->index('produto_id','fk_vendas_has_produtos_produtos1_idx');
		    $table->index('venda_id','fk_vendas_has_produtos_vendas1_idx');
		
		    $table->foreign('venda_id')
		        ->references('id')->on('vendas')
		        ->onDelete('cascade');
		
		    $table->foreign('produto_id')
		        ->references('id')->on('produtos')
		        ->onDelete('cascade');
		
		    $table->timestamps();
		
		});

		Schema::create('compras', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
		    $table->increments('id');
		    $table->date('data');
		    $table->decimal('valor', 10, 2)->nullable()->default(0);
		    $table->decimal('quantidade', 10, 2)->nullable()->default(0);
		    $table->integer('fornecedor_id')->unsigned();
		    $table->integer('empresa_id')->unsigned();
		    
		    
		
		    $table->index('fornecedor_id','fk_compras_fornecedores1_idx');
		    $table->index('empresa_id','fk_compras_empresas1_idx');
		
		    $table->foreign('fornecedor_id')
		        ->references('id')->on('fornecedores')
		        ->onDelete('cascade');
		
		    $table->foreign('empresa_id')
		        ->references('id')->on('empresas')
		        ->onDelete('cascade');
		
		    $table->timestamps();
		
		});

		Schema::create('compras_produtos', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
		    $table->integer('compra_id')->unsigned();
		    $table->integer('produto_id')->unsigned();
		    $table->decimal('subtotal', 10, 2)->nullable()->default(0);
		    $table->decimal('quantidade', 10, 2)->nullable()->default(0);
		    
		    $table->primary('compra_id', 'produto_id');
		
		    $table->index('produto_id','fk_compras_has_produtos_produtos1_idx');
		    $table->index('compra_id','fk_compras_has_produtos_compras1_idx');
		
		    $table->foreign('compra_id')
		        ->references('id')->on('compras')
		        ->onDelete('cascade');
		
		    $table->foreign('produto_id')
		        ->references('id')->on('produtos')
		        ->onDelete('cascade');
		
		    $table->timestamps();
		
		});


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::drop('compras_produtos');
		Schema::drop('compras');
		Schema::drop('vendas_produtos');
		Schema::drop('vendas');
		Schema::drop('produtos');
		Schema::drop('agendamentos');
		Schema::drop('funcionarios_servicos');
		Schema::drop('servicos');
		Schema::drop('fornecedores');
		Schema::drop('funcionario');
		Schema::drop('clientes');
		Schema::drop('usuarios');
		Schema::drop('empresas');

    }
}