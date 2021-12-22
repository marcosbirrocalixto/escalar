@extends('adminlte::page')

@section('title', "Detalhe do Produto {{ $produto->name }}")

@section('content_header')
    <h1>Detalhes do Produto <b>{{ $produto->name }}</b></h1>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            <ul>
                <li>
                    <strong>Título: </strong> {{ $produto->title }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $produto->description }}
                </li>
                <li>
                    <strong>Título: </strong> {{ $produto->categoria->name }}
                </li>
            </ul>

            @include('admin.includes.alerts')

        <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Deletar o Produto: {{ $produto->name }}</button>
        </form>
    </div>
@stop
