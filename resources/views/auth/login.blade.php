<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Hall Solution - Login</title>
		<link href="public/css/bootstrap.min.css" rel="stylesheet">
		<link href="public/css/datepicker3.css" rel="stylesheet">
		<link href="public/css/styles.css" rel="stylesheet">
		<!--[if lt IE 9]>
		<script src="public/js/html5shiv.js"></script>
		<script src="public/js/respond.min.js"></script>
		<![endif]-->
		<style>
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
	</head>
	<body>
		

		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<!-- Notificacao de feedback -->
				@if(Session::has('alerta'))
					<div class="row" id="alerta">
						<div class="col-md-12">
							<div class="alert bg-{{ Session::get('alerta')['class'] }}" role="alert">
								<em class="fa fa-lg fa-{{ isset(Session::get('alerta')['icone']) ?? 'error' }}">&nbsp;</em>
								{{ Session::get('alerta')['mensagem'] }}
							</div>
						</div>
					</div>
				@endif<!-- ./ notificacao -->
				<div class="login-panel panel panel-default">
					<img style="padding: 20px" width="100%" src="{{ asset('public/img/logo.png') }}" alt="">
					<div class="panel-heading text-center">Entre no sistema</div>
					<div class="panel-body">
                        <form action="{{ route('autenticar') }}" method="post" role="form">
                            {{ csrf_field() }}
							<fieldset>
								<div class="form-group">
									<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="">
								</div>
								<div class="form-group">
									<input class="form-control" placeholder="Senha" name="senha" type="password" value="">
								</div>
								<button class="btn btn-block btn-lg btn-primary">Entrar</button>
							</fieldset>
						</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->	
		

		<script src="public/js/jquery-1.11.1.min.js"></script>
		<script src="public/js/bootstrap.min.js"></script>
	</body>
</html>
