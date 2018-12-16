@extends('layouts.base')

@section('titulo') Fornecedores - Hall Solution @endsection
@section('migalha')
    @component('components.breadcrumbs', [
        'itens' => [
            ['valor' => 'Fornecedores'],
            ['valor' => isset($fornecedor) ? 'Atualizar' : 'Inserir novo', 'ativo' => true]
        ]
    ])
    @endcomponent
@stop

@section('conteudo')
    <section class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{ isset($fornecedor) ? 'Atualizar' : 'Cadastrar novo' }}  fornecerdor</div>
                <div class="panel-body">
                @if(isset($fornecedor))
                    <form action="{{ route('fornecedores.atualizar', $fornecedor->id) }}" method="post">
                    {{ method_field('put"') }}
                @else
                    <form action="{{ route('fornecedores.salvar') }}" method="post">
                @endif
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="">Nome</label>
                            <input name="nome" value="{{ $fornecedor->nome ?? '' }}" type="text" class="form-control input-sm">
                        </div>
                        <div class="form-group">
                            <label for="">CNPJ</label>
                            <input name="cnpj" value="{{ $fornecedor->cnpj ?? '' }}" type="text" class="form-control input-sm">
                        </div>

                        <div class="pull-right">
                            <button class="btn btn-primary">
                                {{  isset($fornecedor) ? 'ATUALIZAR' : 'SALVAR' }}</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </section>
@stop

