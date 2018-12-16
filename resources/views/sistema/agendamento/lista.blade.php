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
            ['valor' => 'Agendamentos', 'ativo' => true],
        ]
    ])
    @endcomponent
@stop

@section('conteudo')
    <section class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Todos os agendamentos <a href="{{ route('agendamento.inserir') }}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> INSERIR NOVO</a></div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Data</th>
                            <th>Horario</th>
                            <th>Dia</th>
                            <th>Serviço</th>
                            <th>Funcionário</th>
                            <th>Cliente</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($agendas as $agenda)
                                <tr id="{{ route('agendamento.editar', $agenda->id) }}">
                                    <td><label style="font-size: 13px" class="label label-danger">{{ (new Carbon\Carbon($agenda->data))->format('d/m/Y') }}</label></td>
                                    <td>{{ (new Carbon\Carbon($agenda->horario))->format('h:i') }}</td>
                                    <td>{{ $agenda->dia }}</td>
                                    <td>{{ $agenda->servico->nome }}</td>
                                    <td>{{ $agenda->funcionario->usuario->nome }}</td>
                                    <td>{{ $agenda->cliente->nome }}</td>
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
                // window.location.href = $(this).attr('id')
            })
        })
    </script>
@endpush