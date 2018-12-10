@extends('layouts.base')

@section('titulo') cliente - Hall Solution @endsection
@section('migalha')
    @component('components.breadcrumbs', [
        'itens' => [
            ['valor' => 'cliente'],
            ['valor' => isset($cliente) ? 'Atualizar' : 'Inserir novo', 'ativo' => true]
        ]
    ])
    @endcomponent
@stop

@section('conteudo')
    <section class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{ isset($cliente) ? 'Atualizar' : 'Cadastrar novo' }}  cliente</div>
                <div class="panel-body">
                    @if(isset($cliente))
                        <form action="{{ route('clientes.atualizar', $cliente->id) }}" method="post">
                            {{ method_field('put"') }}
                    @else
                        <form action="{{ route('clientes.salvar') }}" method="post">
                    @endif
                            {{ csrf_field() }}
                            <input type="hidden" name="empresa_id" value="{{ Auth::user()->empresa->id }}">

                            <div class="form-group has-error">
                                <label for="">Nome</label>
                                <input required name="nome" value="{{ $cliente->nome ?? '' }}" type="text" class="form-control input-sm">
                            </div>
                            <div class="form-group has-error">
                                <label for="">Email</label>
                                <input required name="email" value="{{ $cliente->email ?? '' }}" type="email" class="form-control input-sm">
                            </div>
                            <hr>
                            <h4>Endereço</h4>
                            <div class="row">
                                <div class="form-group col-md-4 ">
                                    <label for="">Estado</label>
                                    <select class="form-control input-lg" id="estado" name="estado">
                                        <option {{ isset($cliente) ? $cliente->estado == 'AC' ? 'selected' : '' : '' }} value="AC">Acre</option>
                                        <option {{ isset($cliente) ? $cliente->estado == 'AL' ? 'selected' : '' : '' }} value="AL">Alagoas</option>
                                        <option {{ isset($cliente) ? $cliente->estado == 'AP' ? 'selected' : '' : '' }} value="AP">Amapá</option>
                                        <option {{ isset($cliente) ? $cliente->estado == 'AM' ? 'selected' : '' : '' }} value="AM">Amazonas</option>
                                        <option {{ isset($cliente) ? $cliente->estado == 'BA' ? 'selected' : '' : '' }} value="BA">Bahia</option>
                                        <option {{ isset($cliente) ? $cliente->estado == 'CE' ? 'selected' : '' : '' }} value="CE">Ceará</option>
                                        <option {{ isset($cliente) ? $cliente->estado == 'DF' ? 'selected' : '' : '' }} value="DF">Distrito Federal</option>
                                        <option {{ isset($cliente) ? $cliente->estado == 'ES' ? 'selected' : '' : '' }} value="ES">Espírito Santo</option>
                                        <option {{ isset($cliente) ? $cliente->estado == 'GO' ? 'selected' : '' : '' }} value="GO">Goiás</option>
                                        <option {{ isset($cliente) ? $cliente->estado == 'MA' ? 'selected' : '' : '' }} value="MA">Maranhão</option>
                                        <option {{ isset($cliente) ? $cliente->estado == 'MT' ? 'selected' : '' : '' }} value="MT">Mato Grosso</option>
                                        <option {{ isset($cliente) ? $cliente->estado == 'MS' ? 'selected' : '' : '' }} value="MS">Mato Grosso do Sul</option>
                                        <option {{ isset($cliente) ? $cliente->estado == 'MG' ? 'selected' : '' : '' }} value="MG">Minas Gerais</option>
                                        <option {{ isset($cliente) ? $cliente->estado == 'PA' ? 'selected' : '' : '' }} value="PA">Pará</option>
                                        <option {{ isset($cliente) ? $cliente->estado == 'PB' ? 'selected' : '' : '' }} value="PB">Paraíba</option>
                                        <option {{ isset($cliente) ? $cliente->estado == 'PR' ? 'selected' : '' : '' }} value="PR">Paraná</option>
                                        <option {{ isset($cliente) ? $cliente->estado == 'PE' ? 'selected' : '' : '' }} value="PE">Pernambuco</option>
                                        <option {{ isset($cliente) ? $cliente->estado == 'PI' ? 'selected' : '' : '' }} value="PI">Piauí</option>
                                        <option {{ isset($cliente) ? $cliente->estado == 'RJ' ? 'selected' : '' : '' }} value="RJ">Rio de Janeiro</option>
                                        <option {{ isset($cliente) ? $cliente->estado == 'RN' ? 'selected' : '' : '' }} value="RN">Rio Grande do Norte</option>
                                        <option {{ isset($cliente) ? $cliente->estado == 'RS' ? 'selected' : '' : '' }} value="RS">Rio Grande do Sul</option>
                                        <option {{ isset($cliente) ? $cliente->estado == 'RO' ? 'selected' : '' : '' }} value="RO">Rondônia</option>
                                        <option {{ isset($cliente) ? $cliente->estado == 'RR' ? 'selected' : '' : '' }} value="RR">Roraima</option>
                                        <option {{ isset($cliente) ? $cliente->estado == 'SC' ? 'selected' : '' : '' }} value="SC">Santa Catarina</option>
                                        <option {{ isset($cliente) ? $cliente->estado == 'SP' ? 'selected' : '' : '' }} value="SP">São Paulo</option>
                                        <option {{ isset($cliente) ? $cliente->estado == 'SE' ? 'selected' : '' : '' }} value="SE">Sergipe</option>
                                        <option {{ isset($cliente) ? $cliente->estado == 'TO' ? 'selected' : '' : '' }} value="TO">Tocantins</option>
                                        <option {{ isset($cliente) ? $cliente->estado == 'ES' ? 'selected' : '' : '' }} value="ES">Estrangeiro</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-8 ">
                                    <label for="">Cidade</label>
                                    <input name="cidade" value="{{ $cliente->cidade ?? '' }}" type="text" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4 ">
                                    <label for="">Bairro</label>
                                    <input name="bairro" value="{{ $cliente->bairro ?? '' }}" type="text" class="form-control input-sm">
                                </div>
                                <div class="form-group col-md-6 ">
                                    <label for="">Rua</label>
                                    <input name="rua" value="{{ $cliente->rua ?? '' }}" type="text" class="form-control input-sm">
                                </div>
                                <div class="form-group col-md-2 ">
                                    <label for="">Número</label>
                                    <input name="numero" value="{{ $cliente->numero ?? '' }}" type="text" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="">Complemento</label>
                                <input name="comlemento" value="{{ $cliente->complemento ?? '' }}" type="text" class="form-control input-sm">
                            </div>

                            <div class="pull-right">
                                <button class="btn btn-primary">
                                    {{  isset($cliente) ? 'ATUALIZAR' : 'SALVAR' }}</button>
                            </div>
                        </form>

                </div>
            </div>
        </div>
    </section>
@stop

