@extends('layouts.base')

@section('titulo') Funcionários - Hall Solution @endsection
@section('migalha')
    @component('components.breadcrumbs', [
        'itens' => [
            ['valor' => 'Funcionários'],
            ['valor' => isset($funcionario) ? 'Atualizar' : 'Inserir novo', 'ativo' => true]
        ]
    ])
    @endcomponent
@stop

@section('conteudo')
    <section class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{ isset($funcionario) ? 'Atualizar' : 'Cadastrar novo' }}  funcionário</div>
                <div class="panel-body">
                    @if(isset($funcionario))
                        <form action="{{ route('funcionarios.atualizar', $funcionario->id) }}" method="post">
                        {{ method_field('put"') }}
                    @else
                        <form action="{{ route('funcionarios.salvar') }}" method="post">
                    @endif
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="form-group col-md-6 has-error">
                                    <label for="">Nome</label>
                                    <input required name="nome" value="{{ $funcionario->nome ?? '' }}" type="text" class="form-control input-sm">
                                </div>

                                <div class="form-group col-md-6 has-error">
                                    <label for="">Email</label>
                                    <input required name="email" value="{{ $funcionario->email ?? '' }}" type="email" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="form-group has-error">
                                <label for="">Senha (provisória)</label>
                                @if(isset($funcionario))
                                    <label class="label bg-info">
                                        Para não alterar a senha apena deixe o campo em branco
                                    </label>
                                @endif
                                <input {{ isset($funcionario) ? '' : 'required' }} name="senha" type="password" class="form-control input-sm">
                            </div>
                            <div class="form-group pull-right">
                                <button class="btn btn-primary">
                                    {{  isset($funcionario) ? 'ATUALIZAR' : 'SALVAR' }}</button>
                            </div>
                        </form>
                            @if(isset($funcionario))
                            <br>
                            <hr>
                                <h4>Horários de trabalho</h4>

                                <div id="horarios" class="row">
                                    <form action="{{ route('funcionarios.horario.salvar') }}" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $funcionario->funcionario->id }}" name="funcionario_id">
                                        <div class="col-md-2 form-group has-error">
                                            <label for="">Dia</label>
                                            <select required name="dia" class="form-control input-lg">
                                                <option value="dom">Domingo</option>
                                                <option value="seg">Segunda</option>
                                                <option value="ter">Terça</option>
                                                <option value="qua">Quarta</option>
                                                <option value="qui">Quinta</option>
                                                <option value="sex">Sexta</option>
                                                <option value="sab">Sábado</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2 form-group has-error">
                                            <label for="">Início</label>
                                            <input required name="inicio" value="" type="time" class="form-control">
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label for="">Início almoço</label>
                                            <input name="inicio_almoco" type="time" class="form-control">
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label for="">Fim almoço</label>
                                            <input name="fim_almoco" type="time" class="form-control">
                                        </div>
                                        <div class="col-md-2 form-group has-error">
                                            <label for="">Fim</label>
                                            <input required name="fim" value="" type="time" class="form-control">
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <button type="submit" id="add-horario" style="margin-top: 25px" class="btn btn-default">Adicionar</button>
                                        </div>
                                    </form>

                                </div>

                                <div id="horario-trabalho">
                                    @foreach($funcionario->funcionario->horarios as $horario)
                                    <div class="row">
                                        <div class="col-md-2 form-group">
                                            <label for="">Dia</label>
                                            <input type="text" readonly class="form-control" value="{{ $horario->dia }}">
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label for="">Início</label>
                                            <input value="{{ $horario->inicio ?? '' }}" type="time" class="form-control">
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label for="">Início almoço</label>
                                            <input value="{{ $horario->inicio_almoco ?? '' }}" type="time" class="form-control">
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label for="">Fim almoço</label>
                                            <input value="{{ $horario->fim_almoco ?? '' }}" type="time" class="form-control">
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label for="">Fim</label>
                                            <input value="{{ $horario->fim ?? '' }}" type="time" class="form-control">
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <button type="button" id="{{ $horario->id }}" style="margin-top: 25px" class="remove-horario btn btn-danger"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>

                            @endif

                </div>
            </div>
        </div>
    </section>
@stop

@push('js')
    <script>
        $(function () {
            setTimeout(function () {
                $('input[name="inicio"]').parent().addClass('has-error')
                $('input[name="fim"]').parent().addClass('has-error')
                $('input[name="inicio"]').parent().addClass('has-error')
            }, 200)

            $('.remove-horario').on('click', function () {
                var horario = $(this)

                $.post('{{ route("funcionarios.horario.excluir") }}', {
                    id: horario.attr('id'),
                    _token: '{{ csrf_token() }}'
                }).done(function (resposta){

                    horario.parent().parent().remove()
                })


            })
        })
    </script>
@endpush

