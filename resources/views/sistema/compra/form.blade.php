@extends('layouts.base')

@push('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endpush

@section('titulo') Compras - Hall Solution @endsection
@section('migalha')
    @component('components.breadcrumbs', [
        'itens' => [
            ['valor' => 'Compras'],
            ['valor' => isset($compra) ? 'Atualizar' : 'Inserir novo', 'ativo' => true]
        ]
    ])
    @endcomponent
@stop

@section('conteudo')
    <section class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{ isset($compra) ? 'Atualizar' : 'Cadastrar novo' }}  Compra</div>
                <div class="panel-body">
                    @if(isset($compra))
                        <form action="{{ route('venda.atualizar', $compra->id) }}" method="post">
                            {{ method_field('put"') }}
                    @else
                        <form action="{{ route('venda.salvar') }}" method="post">
                    @endif
                            {{ csrf_field() }}
                            <input type="hidden" value="{{ Auth::user()->empresa->id }}" id="empresa" name="empresa_id">


                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="">Data</label>
                                    <input id="data" name="data" value="{{ $compra->data ?? '' }}" type="date" class="form-control input-sm">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="">Cliente</label>
                                    <select id="fornecedor" type="text" class="form-control input-lg select-2">
                                        @foreach($fornecedores as $fornecedor)
                                            <option {{ isset($compra) ? ($fornecedor->id == $compra->fornecedor->id ? 'selected' : '') : '' }} value="{{ $fornecedor->id }}">{{ $fornecedor->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <hr>

                            @if(!isset($compra))
                                <h4>Adicionar produto</h4>
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label for="">Produto</label>
                                        <select id="produto" type="text" class="form-control input-lg select-2">
                                            @foreach($produtos as $produto)
                                                <option preco="{{ $produto->preco }}" value="{{ $produto->id }}">{{ $produto->nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">Quantidade</label>
                                        <input min="1" value="1" id="qtde" type="number" class="form-control input-sm">
                                    </div>

                                    <div class="col-md-4">
                                        <button id="add-produto" type="button" class="btn btn-default pull-right btn-block" style="margin-top: 30px">Adicionar produto</button>
                                    </div>
                                </div>
                            @endif
                            <br>
                            <h4>Produtos</h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table" id="produtos">
                                        <tbody id="lista-produtos">
                                            @isset($compra)
                                                @foreach($compra->produtos as $produto)
                                                <tr>
                                                    <td>{{ $produto->nome }}</td>
                                                    <td>{{ (int) $produto->pivot->quantidade }} UND</td>
                                                    <td>R$ {{ $produto->pivot->subtotal }}</td>
                                                </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td></td>
                                                <td class="bg-info"><strong>TOTAL</strong></td>
                                                <td class="bg-info"><strong >R$  {{ $compra->valor ?? '' }}<span id="valor-total"></span></strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                
                            </div>

                            @if(!isset($compra))
                                <div class="pull-right">
                                    <button id="salvar" type="button" class="btn btn-primary">
                                        {{  isset($compra) ? 'ATUALIZAR' : 'SALVAR' }}</button>
                                </div>
                            @endif
                        </form>

                </div>
            </div>
        </div>
    </section>
@stop

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        var TOTAL = 0.00
        var PRODUTOS = [];  
        
        function calcTotal(valor){
            PRODUTOS.push({
                id: $('#produto').val(),
                quantidade: $("#qtde").val()
            })

            return TOTAL += valor
        }

    
        $(document).ready(function() {
            $('.select-2').select2();
            

            $('#add-produto').on('click', function(){
                console.log($('#produto').text())
                var totalProduto =  parseFloat($('#produto option:selected').attr('preco')) * parseFloat($("#qtde").val())
                
                $('#lista-produtos').append('<tr><td>'+ $("#produto").text() +'</td><td>'+ $("#qtde").val() +' UND</td><td>R$ '+ totalProduto.toFixed(2) +'</td><td><i  id="delete-'+ $('#produto option:selected').val() +'" class="fa fa-trash"></i></td></tr>')
                $('#valor-total').text(calcTotal(totalProduto).toFixed(2))

            })

            $('#salvar').on('click', function(){
                if(PRODUTOS.length > 0)
                    $.post('{{ route("compra.salvar") }}', {
                        produtos: PRODUTOS,
                        data: $('#data').val(),
                        empresa: $('#empresa').val(),
                        fornecedor: $('#fornecedor').val(),
                        total: TOTAL,
                        _token: '{{ csrf_token() }}'    
                    }).done(function(response){
                            console.log(response)
                            window.location.href = response
                        })
                else    
                    alert('Nenhum produto adicionado')
            })
            
            // $(document).on('click', '.fa-trash', function(){
            //     console.log($(this).parent().parent().remove())
            // })
            
        });
    </script>
@endpush

