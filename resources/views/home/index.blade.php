@extends('layout.layout')

@section('content')
<div class="jumbotron">
    <div class="container text-center">
        <h1>Veridian</h1>      
        <p>Clinica de Atenção Básica</p>
    </div>
</div>
    
<div class="mycontainer" style="min-height: 300px">
    <div class="container bg-3 text-center">    
        <h3>Selecione uma ação</h3>
        <br> <br>
        <div class="row">
            <div class="col-sm-6">
                <a href="{{route('register_create')}}" class="btn btn-primary">Cadastro</a>
            </div>
            <div class="col-sm-6"> 
                <a href="{{route('list')}}" class="btn btn-primary">Listagem de Cidadãos</a>
            </div>
        </div>
    </div>
</div>
@endsection