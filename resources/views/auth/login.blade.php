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
	</head>
	<body>
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="login-panel panel panel-default">
					<div class="panel-heading">Login</div>
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
								<button class="btn btn-block btn-primary">Entrar</button>
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
