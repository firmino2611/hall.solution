<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
        </div>
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">{{ Auth::user()->nome }}</div>
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <form role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Pesquisa">
        </div>
    </form>
    <ul class="nav menu">
        <li class="active"><a href="{{ route('admin.index') }}"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
        <li><a href="#"><em class="fa fa-calendar">&nbsp;</em> Agendamentos</a></li>
        <li><a href="{{ route('clientes.listar') }}"><em class="fa fa-users">&nbsp;</em> Clientes</a></li>
        <li><a href="{{ route('funcionarios.listar') }}"><em class="fa fa-users">&nbsp;</em> Funcionários</a></li>
        <li><a href="{{ route('fornecedores.listar') }}"><em class="fa fa-car">&nbsp;</em> Fornecedores</a></li>
        <li><a href="{{ route('servicos.listar') }}"><em class="fa fa-building">&nbsp;</em> Serviços</a></li>
        <li><a href="{{ route('produtos.listar') }}"><em class="fa fa-shopping-cart">&nbsp;</em> Produtos</a></li>

        <li class="nav-divider"></li>
        <li><a href="{{ route('venda.listar') }}"><em class="fa fa-money">&nbsp;</em> Vendas</a></li>
        <li><a href="{{ route('compra.listar') }}"><em class="fa fa-money">&nbsp;</em> Compras</a></li>

        <li class="nav-divider"></li>
        <li><a href="#"><em class="fa fa-cogs">&nbsp;</em> Configurações</a></li>


    </ul>
</div>