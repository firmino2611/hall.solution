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
            ['valor' => 'Serviços', 'ativo' => true],
        ]
    ])
    @endcomponent
@stop

@section('conteudo')
    <section class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Todos as vendas <a href="{{ route('venda.inserir') }}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> INSERIR NOVO</a></div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Cliente</th>
                                <th>Total</th>
                                <th>Data de cadastro</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($vendas as $venda)
                            <tr id="{{ route('venda.editar', $venda->id) }}">
                                <td>{{ $venda->id }}</td>
                                <td>{{ $venda->cliente->nome }}</td>
                                <td>{{ $venda->valor }}</td>
                                <td>{{ $venda->created_at->format('d/m/Y') }}</td>
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