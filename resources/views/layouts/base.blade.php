<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('titulo')</title>
        <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('public/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('public/css/datepicker3.css') }}" rel="stylesheet">
        <link href="{{ asset('public/css/styles.css') }}" rel="stylesheet">
        <link rel="shortcut icon" href="{{ asset('public/img/logo_favicon.png') }}" type="image/x-icon">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
        <!--Custom Font-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
       
        
        <style>
            .sidebar ul.nav .active a, .sidebar ul.nav li.parent a.active, .sidebar ul.nav .active > a:hover, .sidebar ul.nav li.parent a.active:hover
            , .sidebar ul.nav .active > a:focus, .sidebar ul.nav li.parent a.active:focus{ background: #701f84}

            .sidebar ul.nav a:hover, .sidebar ul.nav li.parent ul li a:hover{
                background: #c52494
            }

            .btn-primary{
                background: #701f84;
                border: none
            }
            .btn-primary:hover{
                background: #c52494
            }

            .btn{
                box-shadow: 4px 4px 4px rgba(0,0,0,.4)
            }
            .btn:hover{
                box-shadow: none
            }

        </style>

        @stack('css')
    </head>
    <body>
        <!-- Cabeçalho -->
        @include('layouts._includes._cabecalho')
        <!-- ./ Cabeçalho -->

        <!-- Menu lateral -->
        @include('layouts._includes._menu')
        <!-- ./ Menu lateral-->
            
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <!-- Migalha de pão -->
            <div class="row">
                @yield('migalha')
            </div><!-- ./ Migalha de pão -->
            <br>
            <!-- Titulo
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-header"> 
                        @yield('cabecalho')
                    </h4>
                </div>
            </div>./ Titulo -->

            <!-- Notificacao de feedback -->
            @if(Session::has('alerta'))
                <div class="row" id="alerta">
                    <div class="col-md-12">
                        <div class="alert bg-{{ Session::get('alerta')['class'] }}" role="alert">
                            <em class="fa fa-lg fa-{{ isset(Session::get('alerta')['icone']) ?? 'check' }}">&nbsp;</em>
                            {{ Session::get('alerta')['mensagem'] }}
                        </div>
                    </div>
                </div>
            @endif<!-- ./ notificacao -->

            <!-- Conteudo dinamico -->
            @yield('conteudo')
             

        </div>	<!--/.main-->

        <!--[if lt IE 9]>
        <script src="{{ asset('public/js/html5shiv.js') }}"></script>
        <script src="{{ asset('public/js/respond.min.js') }}"></script>
        <![endif]-->
        <script src="{{ asset('public/js/jquery-1.11.1.min.js') }}"></script>
        <script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('public/js/bootstrap-datepicker.js') }}"></script>
        <script src="{{ asset('public/js/custom.js') }}"></script>
        <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
        
        <script>
            $(function () {
                setTimeout(function () {
                    $('#alerta').fadeOut('slow')
                }, 2000)

                setTimeout(function(){
                    if($('.has-error').children('.form-control').val() == '')
                        $('.has-error').addClass('has-error')
                    else
                        $('.has-error').removeClass('has-error')
                }, 100)

                $('.has-error').on('keyup', function(){
                    if($(this).children('.form-control').val() == '')
                        $(this).addClass('has-error')
                    else
                        $(this).removeClass('has-error')
                })

                $('table').DataTable({
                    "columnDefs": [
                        {"orderable": true}
                    ],
                    "order": [[0, 'DESC']],
                    "language": {
                        "zeroRecords": "Nenhuma informação encontrada",
                        "infoEmpty": "Mostrando 0 resultados encontrados",
                        "infoFiltered":   "(filtro aplicado nas _MAX_ entradas)",
                        "info":  "Mostrando _START_ a _END_ do total de _TOTAL_ encontradas",
                        "search": "Pesquisa:",
                        "lengthMenu":     "Mostrar _MENU_ resultados",
                        "paginate": {
                            "first":      "First",
                            "last":       "Last",
                            "next":       "Próximo",
                            "previous":   "Anterior"
                        },
                    }
                });

            })
        </script>
        @stack('js')
    </body>
</html>