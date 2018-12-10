@extends('layouts.base')

@push('css')
    <style>
        tr{
            cursor: pointer;
        }
    </style>
@endpush

@section('migalha')
    @component('components.breadcrumbs', [
        'itens' => [
            ['valor' => 'Produtos', 'ativo' => true],
        ]
    ])
    @endcomponent
@stop

@section('conteudo')
    <section class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Todos os produtos <a href="{{ route('produtos.inserir') }}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> INSERIR NOVO</a></div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Nome</th>
                            <th>Preço</th>
                            <th>Estoque</th>
                            <th>Data de cadastro</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($produtos as $produto)
                            <tr id="{{ route('produtos.editar', $produto->id) }}">
                                <td>{{ $produto->id }}</td>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->preco }}</td>
                                <td>
                                    <label style="font-size: 15px" class="label label-{{ $produto->estoque < 10 ? 'danger' : 'info' }}">
                                        {{ $produto->estoque }} UND
                                    </label>
                                </td>
                                <td>{{ $produto->created_at->format('d/m/Y') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </section>
@stop

@push('js')
    <script>
        $(function(){
            $('tr').on('click', function(){
                window.location.href = $(this).attr('id')
            })
        })
    </script>
@endpush