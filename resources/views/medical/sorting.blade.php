@extends('layout.layout')

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

$attendance_code = $attendance_code.'/'.date('Y')

?>

@section('content')
<div class="container" style="margin-top: 70px;">

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

    <form action="{{route('medical_store')}}" method="post">

        @csrf

        <h3>Informação de Atendimento</h3>
        <hr>

        <fieldset class="group">

            <div class="form-group" style="width: 35%;">
                <label for="date">Data:</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    <input type="text" class="form-control" name="date" value="{{$attendance->date}}" readonly>
                </div>
            </div>
            
            <div class="form-group" style="width: 30%;">
                <label for="hour">Hora:</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    <input type="text" class="form-control" name="hour" value="{{$attendance->hour}}" readonly>
                </div>
            </div>

            <div class="form-group">
                <label for="doctor">Médico:</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <select class="form-control" name="doctor" readonly>
                        <option selected>{{$attendance->doctor}}</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="attendance_code">Código de Atendimento:</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" class="form-control" name="attendance_code" value="{{$attendance_code}}" readonly>
                </div>
            </div>

        </fieldset>

        <fieldset class="group">

            <div class="form-group">
                <label for="initial_state">Queixa inicial do Paciente:</label>
                <input type="text" class="form-control" oninput="toUpperFunc(event)" name="initial_state" placeholder="DIGITE A QUEIXA DO PACIENTE">
                @error('initial_state')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

        </fieldset>

        <fieldset class="group">

            <input type="text" style="display: none;" class="form-control" name="id_treatment" id="id_treatment" value="{{$attendance->id}}">

            <input type="text" style="display: none;" class="form-control" name="id" id="id" value="{{$attendance->id}}">

            <div class="form-group" style="display: none;">
                <label for="id_patient">ID</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-tint"></i></span>
                    <input type="text" class="form-control" name="id_patient" id="id_patient" value="{{$citizen->id}}">
                </div>
            </div>

            <div class="form-group">
                <label for="blood_pressure">Pressão Arterial:</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-tint"></i></span>
                    <input type="text" class="form-control" name="blood_pressure" id="blood_pressure" placeholder="000x00 PA MMHG">
                </div>
            </div>
            
            <div class="form-group">
                <label for="temperature">Temperatura Axilar:</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-tint"></i></span>
                    <input type="text" class="form-control" name="temperature" id="temperature" placeholder="00,0 TAX °C">
                </div>
            </div>

            <div class="form-group">
                <label for="heart_rate">Frequência Cardíaca:</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-tint"></i></span>
                    <input type="text" class="form-control" name="heart_rate" id="heart_rate" placeholder="00 FC BMP">
                </div>
            </div>

            <div class="form-group">
                <label for="respiratory_frequency">Frequência Respiratória:</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-tint"></i></span>
                    <input type="text" class="form-control" name="respiratory_frequency" id="respiratory_frequency" placeholder="00 FR IRPM">
                </div>
            </div>

            <div class="form-group">
                <label for="weight">Peso:</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" class="form-control" name="weight" id="weight" placeholder="00,00 KG">
                </div>
            </div>

        </fieldset>

        <hr style="margin: 20px 10px;">

        <fieldset class="group">

            <div class="form-group">
                <label for="emotional_state">Estado Emocional:</label> <br>

                <div class="checkbox">
                    <label><input type="checkbox" name="emotional_state" value="Tranquilo">Tranquilo</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="emotional_state" value="Ansioso">Ansioso</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="emotional_state" value="Agressivo">Agressivo</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="emotional_state" value="Triste">Triste</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="emotional_state" value="Agitado">Agitado</label>
                </div>
            </div>
            
            <div class="form-group">
                <label for="consciousness">Nível de Consciência:</label> <br>

                <div class="checkbox">
                    <label><input type="checkbox" name="consciousness" value="Acordado">Acordado</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="consciousness" value="Sonolento">Sonolento</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="consciousness" value="Orientado">Orientado</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="consciousness" value="Desorientado">Desorientado</label>
                </div>
            </div>

            <div class="form-group">
                <label for="locomotion">Locomoção:</label> <br>

                <div class="checkbox">
                    <label><input type="checkbox" name="locomotion" value="Deambulando">Deambulando</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="locomotion" value="Acamado">Acamado</label>
                </div>
            </div>

        </fieldset>

        <fieldset class="group">

            <div class="form-group">
                <label for="motor_alteration">Se houver, descreva alterações motoras:</label>
                <textarea class="form-control" rows="5" oninput="toUpperFunc(event)" name="motor_alteration" id="motor_alteration"></textarea>
            </div>

            <div class="form-group">
                <label for="speaking">Se houver, descreva alterações na fala:</label>
                <textarea class="form-control" rows="5" oninput="toUpperFunc(event)" name="speaking" id="speaking"></textarea>
            </div>

            <div class="form-group">
                <label for="allergies">Se houver, descreva alergias:</label>
                <textarea class="form-control" rows="5" oninput="toUpperFunc(event)" name="allergies" id="allergies"></textarea>
            </div>

        </fieldset>

        <fieldset class="group">

            <div class="form-group">
                <label for="obs">Observações Gerais:</label>
                <textarea class="form-control" rows="5" oninput="toUpperFunc(event)" name="obs" id="obs"></textarea>
            </div>

        </fieldset>

        <div class="text-center">
            <a href="{{route('home')}}" class="btn btn-default" style="width: fit-content;"><span class="glyphicon glyphicon-repeat"></span> Voltar</a>
            <button type="submit" class="btn btn-primary" style="margin-bottom: 0px; width: fit-content;"><span class="glyphicon glyphicon-ok"></span> Salvar</button>
        </div>

    </form> 

</div>
@endsection