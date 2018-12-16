@extends('layouts.base')

@section('migalha')
    @component('components.breadcrumbs', [
        'itens' => [
            ['valor' => 'Dashboard']
        ]
    ])
    @endcomponent
@stop

@section('conteudo')

    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading">Agendamentos hoje</div>
                <div class="panel-body text-center">
                    <h1>
                        {{ count(App\Agendamento::whereDay('created_at', Carbon\Carbon::now()->day)->get()) }}
                    </h1>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="panel panel-danger">
                <div class="panel-heading">Estoque <i style="font-size: 30px" class="fa fa-info-circle"></i></div>
                <div class="panel-body">
                    <p class="text-justify">Produto que estão com estoque baixo</p>
                    <table class="table">
                        <tbody>
                            @foreach(App\Produto::where('estoque', '<=', 3)->limit(3)->get() as $produto)
                            <tr>
                                <td>{{ $produto->nome }}</td>
                                <td> <label class="label label-danger">{{ $produto->estoque }} und</label></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop