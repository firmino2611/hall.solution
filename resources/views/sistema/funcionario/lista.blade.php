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
            ['valor' => 'Funcionários', 'ativo' => true],
        ]
    ])
    @endcomponent
@stop

@section('conteudo')
    <section class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Todos os funcionário <a href="{{ route('funcionarios.inserir') }}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> INSERIR NOVO</a></div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Data de cadastro</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($funcionarios as $funcionario)
                            @if(!$funcionario->hasRole('admin'))
                                <tr id="{{ route('funcionarios.editar', $funcionario->id) }}">
                                    <td>{{ $funcionario->id }}</td>
                                    <td>{{ $funcionario->nome }}</td>
                                    <td>{{ $funcionario->email }}</td>
                                    <td>{{ $funcionario->created_at->format('d/m/Y') }}</td>
                                </tr>
                            @endif
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