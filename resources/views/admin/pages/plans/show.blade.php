@extends('adminlte::page')

@section('title', "Detalhe do Plano {{ $plan->name }}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
    </ol>
@stop

@section('content')
    <div class="card">
        @include('admin.includes.alerts')
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $plan->name }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $plan->description }}
                </li>
                <li>
                    <strong>Preço Licença: </strong> R$ {{ number_format($plan->licence, 2, ',', '.') }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $plan->description }}
                </li>
            </ul>            
            
        <form action="{{ route('plans.delete', $plan->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Deletar o Plano: {{ $plan->name }}</button>
        </form>
    </div>
@stop
