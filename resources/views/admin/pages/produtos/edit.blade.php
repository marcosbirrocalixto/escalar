@extends('adminlte::page')

@section('title', "Editar Produto {$produto->name}")

@section('content_header')
    <h1>Editar Produto <strong>{{ $produto->name }}</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('produtos.update', $produto->id)}}" class="form" method="post" enctype="multipart/form-data">
                @method('PUT')

                @include('admin.pages.produtos._partials.form')
          </form>
        </div>
    </div>
@stop
