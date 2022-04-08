@extends('layout.layout')


@section('content')
<?php date_default_timezone_set('America/Sao_Paulo'); ?>
<div class="container" style="margin-top: 40px;">

    <h3>Informação Pessoal</h3>
    <hr>

    @csrf

    <fieldset class="group">

        <div class="form-group">
            <label for="cpf">CPF:</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                <input type="text" class="form-control" value="{{$citizen->cpf}}" disabled>
            </div>
        </div>

        <div class="form-group">
            <label for="rg">RG:</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                <input type="text" class="form-control" id="rg" value="{{$citizen->rg}}" disabled>
            </div>
        </div>

        <div class="form-group">
            <label for="prontuario">Prontuário:</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                <input type="text" class="form-control" id="prontuario" value="{{$citizen->prontuario}}" disabled>
            </div>
        </div>

    </fieldset>
    
    <fieldset class="group">

        <div class="form-group">
            <label for="name">Nome: *</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" class="form-control" id="name" value="{{$citizen->name}}" disabled>
            </div>
        </div>

        <div class="form-group">
            <label for="mother">Nome da Mãe: *</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" class="form-control" id="mother" value="{{$citizen->mother}}" disabled>
            </div>
        </div>

    </fieldset>
    
    <fieldset class="group">

        <div class="form-group">
            <label for="cns">CNS: *</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                <input type="text" class="form-control" id="cns" value="{{$citizen->cns}}" disabled>
            </div>
        </div>

        <div class="form-group">
            <label for="born_day">Data de Nascimento: *</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                <input type="text" class="form-control" id="born_day" value="{{$citizen->born_day->format('d/m/Y')}}" disabled>
            </div>
        </div>

        <div class="form-group">
            <label for="gender">Sexo: *</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <select class="form-control" id="gender" disabled>
                    <option selected>{{$citizen->gender}}</option>
                </select>
            </div>
        </div>

    </fieldset>

    <fieldset class="group">

        <div class="form-group">
            <label for="breed">Raça/Cor:</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <select class="form-control" id="breed" disabled>
                    <option selected>{{$citizen->breed}}</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="nationality">Nacionalidade:</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <select class="form-control" id="nationality" disabled>
                    <option selected>{{$citizen->nationality}}</option>
                </select>
            </div>
        </div>

    </fieldset>

    <fieldset class="group">

        <div class="form-group">
            <label for="email">E-mail:</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                <input type="email" class="form-control" id="email" value="{{$citizen->email}}" disabled>
            </div>
        </div>

        <div class="form-group">
            <label for="phone">Telefone Residencial:</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                <input type="tel" class="form-control" id="phone" value="{{$citizen->phone}}" disabled>
            </div>
        </div>

        <div class="form-group">
            <label for="cellphone">Telefone Celular:</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                <input type="tel" class="form-control" id="cellphone" value="{{$citizen->cellphone}}" disabled>
            </div>
        </div>

    </fieldset>

    <h3>Informação de Atendimento</h3>
    <hr>

    <form action="{{route('attendance_store')}}" method="post">

        @csrf

        <div class="form-group" style="width: 40%;">
            <label for="id_treatment">Código de Atendimento: *</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" class="form-control" value='{{$attendance_code . "/" . date("Y")}}' readonly>
            </div> 
        </div>

        <input type="text" style="display: none;" class="form-control" name="id_treatment" value='{{$attendance_id}}'>

        <fieldset class="group">

            <div class="form-group" style="width: 35%;">
                <label for="date">Data: *</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    <input type="text" class="form-control" name="date" id="date" placeholder="DATA" value="<?=date('d/m/Y')?>" required>
                </div>
            </div>
            
            <div class="form-group" style="width: 30%;">
                <label for="hour">Hora: *</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    <input type="text" class="form-control" name="hour" id="hour" placeholder="HORA" value="<?=date('H:i:s')?>" required>
                </div>
            </div>

            <div class="form-group" style="display: none">
                <label for="cpf">CPF:</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                    <input type="text" class="form-control" name="id_patient" id="id_patient" value="{{$citizen->id}}">
                </div>
            </div>

            <div class="form-group">
                <label for="doctor">Médico: *</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <select class="form-control" name="doctor" id="doctor" required>
                        <option disabled>SELECIONE O MÉDICO</option>
                        <option selected>Dr Pascoal</option>
                    </select>
                </div>
            </div>

        </fieldset>

        <div class="text-center">
            <a href="{{route('home')}}" class="btn btn-default" style="width: fit-content;"><span class="glyphicon glyphicon-repeat"></span> Voltar</a>
            <button type="submit" class="btn btn-primary" style="margin-bottom: 0px; width: fit-content;"><span class="glyphicon glyphicon-ok"></span> Salvar</button>
        </div>
    </form>
</div>
@endsection
