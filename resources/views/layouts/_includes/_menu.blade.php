<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="https://www.alternativesyouth.org/wp-content/uploads/2016/11/person-icon.png" class="img-responsive" alt="">
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
        <li class="{{ config('app.url') . $_SERVER["REQUEST_URI"] == route('admin.index') ? 'active' : '' }}"><a href="{{ route('admin.index') }}"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
        <li class="{{ config('app.url') . $_SERVER["REQUEST_URI"] == route('agendamento.listar') ? 'active' : '' }}"><a href="{{ route('agendamento.listar') }}"><em class="fa fa-calendar">&nbsp;</em> Agendamentos</a></li>
        
        @role('admin')
            <li class="{{ config('app.url') . $_SERVER["REQUEST_URI"] == route('clientes.listar') ? 'active' : '' }}"><a href="{{ route('clientes.listar') }}"><em class="fa fa-users">&nbsp;</em> Clientes</a></li>
            <li class="{{ config('app.url') . $_SERVER["REQUEST_URI"] == route('funcionarios.listar') ? 'active' : '' }}"><a href="{{ route('funcionarios.listar') }}"><em class="fa fa-users">&nbsp;</em> Funcionários</a></li>
            <li class="{{ config('app.url') . $_SERVER["REQUEST_URI"] == route('fornecedores.listar') ? 'active' : '' }}"><a href="{{ route('fornecedores.listar') }}"><em class="fa fa-car">&nbsp;</em> Fornecedores</a></li>
            <li class="{{ config('app.url') . $_SERVER["REQUEST_URI"] == route('servicos.listar') ? 'active' : '' }}"><a href="{{ route('servicos.listar') }}"><em class="fa fa-building">&nbsp;</em> Serviços</a></li>
            <li class="{{ config('app.url') . $_SERVER["REQUEST_URI"] == route('produtos.listar') ? 'active' : '' }}"><a href="{{ route('produtos.listar') }}"><em class="fa fa-shopping-cart">&nbsp;</em> Produtos</a></li>

            <li class="nav-divider"></li>
            <li class="{{ config('app.url') . $_SERVER["REQUEST_URI"] == route('venda.listar') ? 'active' : '' }}"><a href="{{ route('venda.listar') }}"><em class="fa fa-money">&nbsp;</em> Vendas</a></li>
            <li class="{{ config('app.url') . $_SERVER["REQUEST_URI"] == route('compra.listar') ? 'active' : '' }}"><a href="{{ route('compra.listar') }}"><em class="fa fa-money">&nbsp;</em> Compras</a></li>
        @endrole

        @role('master')
            <li class="{{ config('app.url') . $_SERVER["REQUEST_URI"] == route('empresas.listar') ? 'active' : '' }}"><a href="{{ route('empresas.listar') }}"><em class="fa fa-home">&nbsp;</em> Empresas</a></li>
        @endrole

        <li class="nav-divider"></li>
        <li class="{{ config('app.url') . $_SERVER["REQUEST_URI"] == route('config.editar') ? 'active' : '' }}"><a href="{{ route('config.editar') }}"><em class="fa fa-cogs">&nbsp;</em> Configurações</a></li>
        
        <li><a href="{{ route('admin.logout') }}"><em class="fa fa-logout">&nbsp;</em> Sair</a></li>


        
    </ul>
</div>