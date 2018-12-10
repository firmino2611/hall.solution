@extends('layouts.base')

@push('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

@endpush

@section('titulo') Fornecedores - Hall Solution @endsection
@section('migalha')
    @component('components.breadcrumbs', [
        'itens' => [
            ['valor' => 'Serviços'],
            ['valor' => isset($produto) ? 'Atualizar' : 'Inserir novo', 'ativo' => true]
        ]
    ])
    @endcomponent
@stop

@section('conteudo')
    <section class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{ isset($produto) ? 'Atualizar' : 'Cadastrar novo' }}  Serviços</div>
                <div class="panel-body">
                    @if(isset($produto))
                        <form action="{{ route('produtos.atualizar', $produto->id) }}" method="post">
                            {{ method_field('put"') }}
                    @else
                        <form action="{{ route('produtos.salvar') }}" method="post">
                    @endif
                            {{ csrf_field() }}
                            <input type="hidden" value="{{ Auth::user()->empresa->id }}" name="empresa_id">


                            <div class="row">
                                <div class="form-group col-md-8 has-error">
                                    <label for="">Nome</label>
                                    <input name="nome" value="{{ $produto->nome ?? '' }}" type="text" class="form-control input-sm">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Preço</label>
                                    <input name="preco" value="{{ $produto->preco ?? '' }}" type="text" class="form-control input-sm">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Descrição</label>
                                <textarea name="descricao" rows="7" type="text" class="form-control input-sm">{{ $produto->descricao ?? '' }}</textarea>
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

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endpush

