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
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Blank page</div>
                <div class="panel-body">
                    Blank page
                </div>
            </div>
        </div>
    </div>

@stop