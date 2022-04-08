@extends('layout.layout')


@section('content')

<?php 
date_default_timezone_set('America/Sao_Paulo');

$year = $citizen->born_day->format('Y');
$month = $citizen->born_day->format('m');
$day = $citizen->born_day->format('d');
$age = date('Y') - $year;

if (date('m') < $month) {
    $age -= 1;
} elseif ((date("m") == $month) && (date("d") < $diaNasc) ){
    $idade -= 1;
}

$attendance_code = $attendance->id;
while (strlen($attendance_code) < 6) {
    $attendance_code = "0".$attendance_code;
}
?>

<div class="container" style="margin-top: 70px;">
        
    <button class="btn btn-success" id="myBtn"><span class="glyphicon glyphicon-plus-sign"></span></button>

    <div class="text-center" id="div-float">

        <div class="form-group" style="margin-top: 10px;">
            <label for="attest_days" style="color: white;">Quantidade de dias: *</label>
            <input type="text" class="form-control" placeholder="DIGITE OS DIAS" id="attest_days">
        </div>

        <div class="form-group" style="margin-top: 10px;">
            <label for="cid" style="color: white;">CID: *</label>
            <input type="text" class="form-control" placeholder="DIGITE O CID" id="cid">
        </div>

        <button class="btn btn-primary" id="person-btn">Gerar Atestado</button>
    </div>

    <div style="display: flex;">
        <h3 style="width: 100%;">Informação Cadastral</h3>
        <img src="{{asset('images/fi-rr-user.svg')}}" alt="Cidadão">
        <hr>
    </div>

    <fieldset class="group">

        <div class="form-group">
            <label for="name">Nome:</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" class="form-control" id="name" value="{{$citizen->name}}" disabled>
            </div>
        </div>

        <div class="form-group" style="width: 40%;">
            <label for="cpf">CPF:</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                <input type="text" class="form-control" id="cpf" value="{{$citizen->cpf}}"  disabled>
            </div>
        </div>

        <div class="form-group" style="width: 40%;">
            <label for="prontuario">Prontuário:</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                <input type="text" class="form-control" id="prontuario" value="{{$citizen->prontuario}}" disabled>
            </div>
        </div>

    </fieldset>
    
    <fieldset class="group">

        <div class="form-group">
            <label for="mother">Nome da Mãe:</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" class="form-control" id="mother" value="{{$citizen->mother}}"  disabled>
            </div>
        </div>

        <div class="form-group">
            <label for="cns">CNS:</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                <input type="text" class="form-control" id="cns" value="{{$citizen->cns}}"  disabled>
            </div>
        </div>

        <div class="form-group">
            <label for="born_day">Data de Nascimento:</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                <input type="text" class="form-control" id="born_day" value="{{$citizen->born_day->format('d/m/Y')}}"  disabled>
            </div>
        </div>

        <div class="form-group">
            <label for="age">Idade:</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" class="form-control" id="age" value="{{$age}}" disabled>
            </div>
        </div>

    </fieldset>

    <h3>Informação de Atendimento</h3>
    <hr>

    <fieldset class="group">

        <div class="form-group" style="width: 35%;">
            <label for="date">Data:</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                <input type="text" class="form-control" id="date" value="{{$attendance->date}}" disabled>
            </div>
        </div>
        
        <div class="form-group" style="width: 30%;">
            <label for="hour">Hora:</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                <input type="text" class="form-control" id="hour" value="{{$attendance->hour}}" disabled>
            </div>
        </div>

        <div class="form-group">
            <label for="doctor">Médico:</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <select class="form-control" id="doctor" disabled>
                    <option>{{$attendance->doctor}}</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="attendance_code">Código de Atendimento:</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" class="form-control" id="attendance_code" value="{{$attendance_code}}" disabled>
            </div>
        </div>

    </fieldset>

    <fieldset>

        <div class="form-group">
            <label for="initial_state">Queixa inicial do Paciente:</label>
            <input type="text" class="form-control" id="initial_state" value="{{$treat->initial_state}}" disabled>
        </div>

    </fieldset>

    <fieldset class="group">

        <div class="form-group">
            <label for="blood_pressure">Pressão Arterial:</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-tint"></i></span>
                <input type="text" class="form-control" id="blood_pressure" value="{{$treat->blood_pressure}}" disabled>
            </div>
        </div>
        
        <div class="form-group">
            <label for="temperature">Temperatura Axilar:</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-tint"></i></span>
                <input type="text" class="form-control" id="temperature" value="{{$treat->temperature}}" disabled>
            </div>
        </div>

        <div class="form-group">
            <label for="heart_rate">Frequência Cardíaca:</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-tint"></i></span>
                <input type="text" class="form-control" id="heart_rate" value="{{$treat->heart_rate}}" disabled>
            </div>
        </div>

        <div class="form-group">
            <label for="respiratory_frequency">Frequência Respiratória:</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-tint"></i></span>
                <input type="text" class="form-control" id="respiratory_frequency" value="{{$treat->respiratory_frequency}}" disabled>
            </div>
        </div>

        <div class="form-group">
            <label for="weight">Peso:</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" class="form-control" id="weight" value="{{$treat->weight}}" disabled>
            </div>
        </div>

    </fieldset>

    <hr style="margin: 20px 10px;">

    <fieldset class="group">

        <div class="form-group">
            <label for="emotional_state">Estado Emocional:</label> <br>

            <div class="checkbox">
                <label><input type="checkbox" name="emotional_state" checked readonly>{{$treat->emotional_state}}</label>
            </div>
        </div>
        
        <div class="form-group">
            <label for="consciousness">Nível de Consciência:</label> <br>

            <div class="checkbox">
                <label><input type="checkbox" name="consciousness" checked readonly>{{$treat->consciousness}}</label>
            </div>
        </div>

        <div class="form-group">
            <label for="locomotion">Locomoção:</label> <br>

            <div class="checkbox">
                <label><input type="checkbox" name="locomotion" checked readonly>{{$treat->locomotion}}</label>
            </div>
        </div>

    </fieldset>

    <fieldset class="group">

        <div class="form-group">
            <label for="motor_alteration">Se houver, descreva alterações motoras:</label>
            <textarea class="form-control" rows="5" name="motor_alteration" disabled>{{$treat->motor_alteration}}</textarea>
        </div>

        <div class="form-group">
            <label for="speaking">Se houver, descreva alterações na fala:</label>
            <textarea class="form-control" rows="5" name="speaking" disabled>{{$treat->speaking}}</textarea>
        </div>

        <div class="form-group">
            <label for="allergies">Se houver, descreva alergias:</label>
            <textarea class="form-control" rows="5" name="allergies" disabled>{{$treat->allergies}}</textarea>
        </div>

    </fieldset>

    <fieldset class="group">

        <div class="form-group">
            <label for="obs">Observações Gerais:</label>
            <textarea class="form-control" rows="5" name="obs" disabled>{{$treat->obs}}</textarea>
        </div>

    </fieldset>

    <form id="form" action="{{route('medical_finalize', ['id' => $treat->id])}}" method="post">

        @csrf
        {{ method_field('PATCH') }}

        <input type="text" style="display: none;" class="form-control" name="medicins" id="medicins">

        <fieldset class="group">

            <div class="form-group" id="obs-div">
                <label for="medical_conduct">Conduta médica:</label>
                <textarea class="form-control" rows="5" oninput="toUpperFunc(event)" name="medical_conduct"></textarea>
            </div>
            @error('medical_conduct')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            
            <div tabindex="0" class="form-group" id="div-table">
                <div class="table-responsive">          
                    <table class="table" id="table" style="min-height: 130px;">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Medicamento</th>
                            <th></th>
                            <th>Qtd</th>
                            <th><a id="add-medicament" onclick="tableForm()"><span class="glyphicon glyphicon-plus"></span></a></th>
                        </tr>
                        </thead>
                        <tbody id="table-body">
                        <tr>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <p><strong>Para salvar um registro aperte a tecla ENTER.</strong></p> <br>
                <p><strong>Para cancelar a edição aperte a tecla ESC.</strong></p>
            </div>

        </fieldset>

        <div class="text-center">
            <a href="{{route('home')}}" class="btn btn-default" style="width: fit-content;"><span class="glyphicon glyphicon-repeat"></span> Voltar</a>
            <button type="submit" class="btn btn-primary" style="margin-bottom: 0px; width: fit-content;"><span class="glyphicon glyphicon-ok"></span> Salvar</button>
        </div>

    </form>
</div>
@endsection