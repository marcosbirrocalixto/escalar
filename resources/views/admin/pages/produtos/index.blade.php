@extends('adminlte::page')

@section('title', 'Produto')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('produtos.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('produtos.index') }}" class="">Produtos</a></li>
    </ol>

    <h1>Produtos  <a href="{{ route('produtos.create')}}" class="btn btn-primary"><i class="fas fa-plus-square"></i> Adicionar Produto</a></h1>

@stop

@section('content')
    <div class="card">
        @include('admin.includes.alerts')
        <div class="card header">
            <form action="{{ route('produtos.search')}}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Palavra de pesquisa" class="form-control" value="{{ $filters['filter'] ?? ''}}">
                <button type="submit" class="btn btn-primary"><i class="fab fa-searchengin"></i> Pesquisar </button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Categoria</th>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th>Preço</th>
                        <th style="width: 250px">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtos as $produto)
                    <tr>
                        <td>{{ $produto->categoria->name}}</td>
                        <td>{{ $produto->title }}</td>
                        <td>{{ $produto->description }}</td>
                        <td>
                            R$ {{ number_format($produto->price, 2, ',', '.') }}
                        </td>
                        <td style="width: 10px">
                            <a href="{{route('produtos.edit', $produto->id)}}" class="btn btn-info">Edit</a>
                            <a href="{{route('produtos.show', $produto->id)}}" class="btn btn-warning">Ver</a>
                            <a href="" class="btn btn-info" title="Categorias"><i class="fas fa-layer-group"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $produtos->appends($filters)->links() !!}
            @else
                {!! $produtos->links() !!}
            @endif

        </div>
    </div>
@stop
