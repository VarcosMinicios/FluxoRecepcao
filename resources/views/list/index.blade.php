@extends('layout.layout')

@section('content')
<div class="container" style="margin-top: 70px; min-height: 500px;">

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Efetuar Exclusão?</h4>
                </div>
            <div class="modal-body">
                <p id="modal-text"></p>
            </div>
                <div class="modal-footer">
                    <form id="exclude-btn" action="{{route('register_destroy', ['id' => 'id'])}}" method="POST">
                        @csrf
                        @method('delete')
                        <a class="btn btn-default" data-dismiss="modal">Cancelar</a>
                        <button type="submit" class="btn btn-default">Confirmar</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Sucesso!</strong> {{session('message')}}
        </div>
    @endif


    <table class="table table-striped table-bordered" style="margin-top: 40px;">
        <thead>
            <tr>
                <th>NOME</th>
                <th>DATA DE NASCIMENTO</th>
                <th>CNS</th>
                <th>NOME DA MÃE</th>
                <th>AÇÃO</th>
            </tr>
        </thead>
        <tbody>
            @foreach($citizens as $citizen)
            <tr>
                <td>{{$citizen->name}}</td>
                <td>{{$citizen->born_day->format('d/m/Y')}}</td>
                <td>{{$citizen->email}}</td>
                <td>{{$citizen->mother}}</td>
                <td>
                    <div class="btn-group">

                        <a href="{{route('register_edit', ['id' => $citizen->id])}}" style="padding: 0px 5px;" class="btn btn-basic">
                            <img src="images/fi-rr-edit.svg" alt="">
                        </a>

                        <a class="btn btn-basic" style="padding: 0px 5px;" onclick="getCurrentExclude('{{$citizen->name}}', {{$citizen->id}})" data-toggle="modal" data-target="#myModal">
                            <img src="images/fi-rr-cross.svg" alt="">
                        </a>

                        <a href="{{route('attendance_create', ['id' => $citizen->id])}}" style="padding: 0px 5px;" class="btn btn-basic">
                            <img src="images/fi-rr-add.svg" alt="">
                        </a>
                        
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
