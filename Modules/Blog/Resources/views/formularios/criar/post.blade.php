@extends('layouts.sistema')

@section('content')

	 <section class="content-header">
        <h1><i class="fa fa-newspaper-o"></i> Publicar uma postagem<small>Seja bem vindo</small></h1>

        <ol class="breadcrumb">
            {{--<li><a href="http://bpocallaghan.co.za/admin/faqs"><i class="fa fa-question"></i> FAQ</a></li>--}}
            {{--<li><a href="http://bpocallaghan.co.za/admin/faqs"><i class="fa fa-question"></i> FAQ Questions</a></li>--}}
            <li><a href=""><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href=""><i class="fa fa-newspaper-o"></i> Blog</a></li>
            <li>Publicar</li>
        </ol>
    </section>
	<br>
    <section class="container-fluid	">	
    	<div class="row">
    		<div class="col-md-8">
    			<div class="box box-primary ">
		    		<div class="box-body">
		    			<form action="{{ route('post.salvar') }}" method="post">
		    				{{ csrf_field() }}
		    				<div class="form-group">
		    					<h4 for="">Titulo</h4>
		    					<input name="titulo" type="text" class="form-control">
		    				</div>

		    				<div class="form-group">
		    					<h4 for="">Descricao</h4>
		    					<textarea name="descricao" id="summernote" type="text" rows="5" class="form-control"></textarea> 
		    				</div>

		    				<div class="form-group">
		    					<h4 for="">Imagem</h4>
		    					<input name="imagem" type="file" class="form-control"> 
		    				</div>

		    				<button class="btn btn-primary">PUBLICAR</button>

		    			</form>
		    		</div>
		    	</div>
    		</div>
    		
    	</div>
    	
    </section>

@stop