@extends('layouts.base')

@section('titulo') Configurações - Hall Solution @stop
@section('migalha')
    @component('components.breadcrumbs', [
        'itens' => [
            ['valor' => 'Configurações'],
        ]
    ])
    @endcomponent
@stop

@section('conteudo')
    <section class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Atualizar dados da empresa</div>
                <div class="panel-body">

                    @if(isset($empresa) or Auth::user()->hasRole('admin'))
                    <form action="{{ route('empresas.atualizar', Auth::user()->empresa->id) }}" method="post">
                        {{ method_field('put"') }}
                    @else
                    <form action="{{ route('empresas.salvar') }}" method="post">

                    @endif
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="form-group col-md-6 has-error">
                                <label for="">Nome</label>
                                <input required name="nome" value="{{  Auth::user()->empresa->nome ?? '' }}" type="text" class="form-control input-sm">
                            </div>

                            <div class="form-group col-md-6 has-error">
                                <label for="">Resumo</label>
                                <textarea  name="resumo" value="{{ Auth::user()->empresa->resumo ?? '' }}" type="email" class="form-control input-sm"></textarea>
                            </div>
                            <div class="form-group col-md-6 has-error">
                                <label for="">Pessoa</label>
                                <select name="pessoa" class="form-control">
                                    <option {{ Auth::user()->empresa->pessoa == 'fisica' ? 'selected' : ''  }} value="fisica">Física</option>
                                    <option {{ Auth::user()->empresa->pessoa == 'juridica' ? 'selected' : ''  }} value="juridica">Jurídica</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6 has-error">
                                <label for="">CNPJ/CPF</label>
                                <input  name="cnpj" value="{{ Auth::user()->empresa->cnpj ?? '' }}" type="text" class="form-control input-sm">
                            </div>

                            <div class="form-group col-md-6 has-error">
                                <label for="">Email</label>
                                <input required name="email" value="{{ Auth::user()->empresa->email ?? '' }}" type="text" class="form-control input-sm">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary pull-right">ATUALIZAR</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </section>
@stop

