<ol class="breadcrumb">
    <li><a style="color: purple" href="{{ route('admin.index') }}">
        <em class="fa fa-home"></em>
    </a></li>
    @foreach($itens as $item)
        <li class="{{ isset($item['ativo']) ? 'active' : '' }}">
            {{ $item['valor'] }}
        </li>
    @endforeach

</ol>