@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
<h1>Orçamento <a href="#" class="btn btn-primary"><i class="fas fa-plus-square"></i> Adicionar
        Plano</a></h1>

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('plans.index') }}">Planos</a></li>
</ol>
@stop

@section('content')
<div class="card">
    @include('admin.includes.alerts')
    <div class="card header">
        <form action="#" method="POST" class="form form-inline">
            @csrf
            <input type="text" name="filter" placeholder="Palavra de pesquisa" class="form-control"
                value="{{ $filters['filter'] ?? ''}}">
            <button type="submit" class="btn btn-primary"><i class="fab fa-searchengin"></i> Pesquisar </button>
        </form>
    </div>
    <div class="card-body">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th style="width: 300px">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($plans as $plan)
                <tr>
                    <td>
                        {{ $plan->name }}
                    </td>
                    <td>
                        {{ $plan->description }}
                    </td>
                    <td>
                        R$ {{ number_format($plan->license, 2, ',', '.') }}
                    </td>
                    <td style="width: 10px">
                        <a href="#" class="btn btn-primary">Detalhe</a>
                        <a href="#" class="btn btn-info">Edit</a>
                        <a href="#" class="btn btn-warning">Ver</a>
                        <a href="#" class="btn btn-warning"><i class="fas fa-address-book"></i>Perfis</a>
                            </td>
                        </td>
                    </tr>
                    @endforeach    
                </tbody>
            </table>
        </div>

    </div>
@stop