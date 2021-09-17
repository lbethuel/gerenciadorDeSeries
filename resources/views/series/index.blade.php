@extends ('layout')

@section('cabecalho')
Series
@endsection

@section('conteudo')
@if(!empty($mensagem))
<div class="alert alert-success">
    {{$mensagem}}
</div>
@endif

<a href="/series/criar" class="btn btn-dark mb-2">Adicionar</a>
<ul class="list-group">
    @foreach ($series as $serie)
    <li class="list-group-item d-flex justify-content-between">
        {{ $serie->nome }}


        <span class="d-flex ">
        <a  href="/series/{{$serie->id}}/temporadas" class="btn btn-info btn-sm mr-1">
            <i>Info</i>
        </a>


        <form method="POST" action="/series/remover/{{$serie->id}}" 
            onsubmit="return confirm('Tem certeza?')">
            @csrf
            <button class="btn btn-danger btn-sm">Excluir</button>
        </form>
        </span>
    </li>

    @endforeach
</ul>
@endsection