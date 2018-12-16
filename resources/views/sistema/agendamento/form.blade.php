@extends('layouts.base')

@push('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

@endpush

@section('titulo') Agendamento - Hall Solution @endsection
@section('migalha')
    @component('components.breadcrumbs', [
        'itens' => [
            ['valor' => 'Serviços'],
            ['valor' => isset($agenda) ? 'Atualizar' : 'Inserir novo', 'ativo' => true]
        ]
    ])
    @endcomponent
@stop

@section('conteudo')
    <section class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{ isset($agenda) ? 'Atualizar' : 'Cadastrar novo' }}  agendamento</div>
                <div class="panel-body">
                    @if(isset($agenda))
                        <form action="{{ route('agendamento.atualizar', $agenda->id) }}" method="post">
                            {{ method_field('put"') }}
                    @else
                        <form action="{{ route('agendamento.salvar') }}" method="post">
                    @endif
                            {{ csrf_field() }}
                            <input type="hidden" value="{{ Auth::user()->empresa->id }}" name="empresa_id">

                            <div class="row">
                                <div class="form-group col-md-4 has-error">
                                    <label for="">Data</label>
                                    <input required name="data" value="{{ $agenda->data ?? '' }}" type="date" class="form-control input-sm">
                                </div>
    
                                <div class="form-group col-md-4 has-error">
                                    <label for="">Horario</label>
                                    <select required name="horario" value="{{ $agenda->horario ?? '' }}" type="time" class="form-control input-lg">
                                        <option value="08:00">8:00</option>
                                        <option value="09:00">9:00</option>
                                        <option value="10:00">10:00</option>
                                        <option value="11:00">11:00</option>
                                        <option value="13:00">13:00</option>
                                        <option value="14:00">14:00</option>
                                        <option value="15:00">15:00</option>
                                        <option value="16:00">16:00</option>
                                        <option value="17:00">17:00</option>
                                        <option value="18:00">18:00</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="">Cliente</label>
                                <select required name="cliente_id" type="text" class="form-control input-lg js-example-basic-multiple" >
                                    @foreach(Auth::user()->empresa->clientes as $cliente)
                                        <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <hr>
                            <h4>Serviço</h4>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Serviço</label>
                                    <select required name="servico_id" type="text" class="form-control input-lg js-example-basic-multiple" >
                                        @foreach(Auth::user()->empresa->servicos as $servico)
                                            <option value="{{ $servico->id }}">{{ $servico->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">Funcionário</label>
                                    <select required name="funcionario_id" type="text" class="form-control input-lg js-example-basic-multiple" >
                                        @foreach(Auth::user()->empresa->funcionarios as $func)
                                            @if(!$func->hasRole('admin'))
                                                <option {{ isset($agenda) ? ($func->funcionario->fazServico($agenda) ? 'selected' : '') : '  ' }} value="{{ $func->funcionario['id'] }}">{{ $func->nome }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="pull-right">
                                <button class="btn btn-primary">
                                    {{  isset($agenda) ? 'ATUALIZAR' : 'SALVAR' }}</button>
                            </div>
                        </form>

                </div>
            </div>
        </div>
    </section>
@stop

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endpush

