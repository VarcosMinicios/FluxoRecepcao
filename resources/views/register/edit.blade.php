@extends('layout.layout')

@section('content')
<div class="container" style="margin-top: 60px;">

    <form action="{{route('register_update', ['id' => $citizen->id])}}" method="POST">

        @csrf
        {{ method_field('PATCH') }}

        <h3>Informação Pessoal</h3>
        <hr>

        <fieldset class="group">

            <div class="form-group">
                <label for="cpf">CPF:</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                    <input type="text" class="form-control" name="cpf" id="cpf" value="{{$citizen->cpf}}" placeholder="DIGITE O CPF">
                </div>
            </div>

            <div class="form-group">
                <label for="rg">RG:</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                    <input type="text" class="form-control" name="rg" id="rg" value="{{$citizen->rg}}" placeholder="DIGITE O RG">
                </div>
            </div>

            <div class="form-group">
                <label for="prontuario">Prontuário:</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                    <input type="text" class="form-control" name="prontuario" id="prontuario" value="{{$citizen->prontuario}}" placeholder="DIGITE O N° DE PRONTUÁRIO">
                </div>
            </div>

        </fieldset>
    
        <fieldset class="group">

            <div class="form-group">
                <label for="name">Nome: *</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" class="form-control" name="name" id="name" oninput="toUpperFunc(event)" value="{{$citizen->name}}" placeholder="DIGITE O NOME" required>
                </div>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="mother">Nome da Mãe: *</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" class="form-control" name="mother" id="mother" oninput="toUpperFunc(event)" value="{{$citizen->mother}}" placeholder="DIGITE A MÃE" required>
                </div>
                @error('mother')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

        </fieldset>
    
        <fieldset class="group">

            <div class="form-group">
                <label for="cns">CNS: *</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                    <input type="text" class="form-control" name="cns" id="cns" value="{{$citizen->cns}}" placeholder="DIGITE O CNS" required>
                </div>
                @error('cns')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="born_day">Data de Nascimento: *</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    <input type="date" class="form-control" name="born_day" id="born_day" value="{{$citizen->born_day->format('Y-m-d')}}" placeholder="DIGITE O NASCIMENTO" required>
                </div>
                @error('born_day')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="gender">Sexo: *</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <select class="form-control" name="gender" id="gender" required>
                        <option disabled>SELECIONE</option>
                        <option>MASCULINO</option>
                        <option>FEMININO</option>
                    </select>
                </div>
                @error('gender')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

        </fieldset>

        <fieldset class="group">

            <div class="form-group">
                <label for="breed">Raça/Cor:</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <select class="form-control" name="breed" id="breed">
                        <option disabled>SELECIONE</option>
                        <option>BRANCO</option>
                        <option>PRETO</option>
                        <option>PARDO</option>
                        <option>AMARELO</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="nationality">Nacionalidade:</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <select class="form-control" name="nationality" id="nationality">
                        <option disabled>SELECIONE O SEXO</option>
                        <option>BRASILEIRO</option>
                        <option>ESTRANGEIRO</option>
                    </select>
                </div>
            </div>

        </fieldset>

        <fieldset class="group">

            <div class="form-group">
                <label for="email">E-mail:</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input type="email" class="form-control" name="email" id="email" value="{{$citizen->email}}" placeholder="DIGITE O EMAIL">
                </div>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone">Telefone Residencial:</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                    <input type="tel" class="form-control" name="phone" id="phone" value="{{$citizen->phone}}" placeholder="DIGITE O TELEFONE">
                </div>
            </div>

            <div class="form-group">
                <label for="phone_two">Telefone Celular:</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                    <input type="tel" class="form-control" name="cellphone" id="cellphone" value="{{$citizen->cellphone}}" placeholder="DIGITE O TELEFONE">
                </div>
            </div>

        </fieldset>

        <h3>Informação Residencial</h3>
        <hr>

        <fieldset class="group">

            <div class="form-group">
                <label for="cep">CEP: *</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                    <input type="text" class="form-control" name="cep" id="cep" value="{{$citizen->cep}}" placeholder="DIGITE O CEP" required>
                </div>
                @error('cep')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="state">Estado: *</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                    <select class="form-control" name="state" id="state" required>
                        <option disabled>SELECIONE O ESTADO</option>
                        <option>ACRE</option>
                        <option>ALAGOAS</option>
                        <option>AMAPÁ</option>
                        <option>AMAZONAS</option>
                        <option>BAHIA</option>
                        <option>CEARÁ</option>
                        <option>DISTRITO FEDERAL</option>
                        <option>ESPÍRITO SANTO</option>
                        <option>GOIÁS</option>
                        <option>MARANHÃO</option>
                        <option>MATO GROSSO</option>
                        <option>MATO GROSSO DO SUL</option>
                        <option>MINAS GERAIS</option>
                        <option>PARÁ</option>
                        <option>PARAÍBA</option>
                        <option>PARANÁ</option>
                        <option>PERNAMBUCO</option>
                        <option>PIAUÍ</option>
                        <option>RIO DE JANEIRO</option>
                        <option>RIO GRANDE DO NORTE</option>
                        <option>RIO GRANDE DO SUL</option>
                        <option>RONDÔNIA</option>
                        <option>RORAIMA</option>
                        <option>SANTA CATARINA</option>
                        <option>SÃO PAULO</option>
                        <option>SERGIPE</option>
                        <option>TOCANTINS</option>
                    </select>
                </div>
                @error('states')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="city">Cidade: *</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                    <input type="text" class="form-control" name="city" id="city" oninput="toUpperFunc(event)" value="{{$citizen->city}}" placeholder="DIGITE A CIDADE" required>
                </div>
                @error('city')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

        </fieldset>

        <fieldset class="group">

            <div class="form-group">
                <label for="district">Bairro: *</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                    <input type="text" class="form-control" name="district" id="district" oninput="toUpperFunc(event)" value="{{$citizen->district}}" placeholder="DIGITE O BAIRRO" required>
                </div>
                @error('district')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="adress_type">Tipo de Logadouro: *</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                    <select class="form-control" name="adress_type" id="adress_type" required>
                        <option disabled>SELECIONE O ESTADO</option>
                        <option>AVENIDA</option>
                        <option>CAMPO</option>
                        <option>CHÁCARA</option>
                        <option>CONDOMÍNIO</option>
                        <option>DISTRITO</option>
                        <option>ESTRADA</option>
                        <option>FAZENDA</option>
                        <option>JARDIM</option>
                        <option>LOTEAMENTO</option>
                        <option>PARQUE</option>
                        <option>PRAÇA</option>
                        <option>RUA</option>
                        <option>TRAVESSA</option>
                        <option>TREVO</option>
                        <option>VIELA</option>
                        <option>RODOVIA</option>
                    </select>
                </div>
                @error('adress_type')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="adress">Logadouro: *</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                    <input type="text" class="form-control" name="adress" id="adress" oninput="toUpperFunc(event)" value="{{$citizen->adress}}" placeholder="DIGITE O ENDEREÇO" required>
                </div>
                @error('adress')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

        </fieldset>

        <fieldset class="group">

            <div class="form-group">
                <label for="number">Número: *</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                    <input type="text" class="form-control" name="number" id="number" value="{{$citizen->number}}" placeholder="DIGITE O NÚMERO" required>
                </div>
                @error('number')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="reference">Ponto de Referência:</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                    <input type="text" class="form-control" name="reference" id="reference" oninput="toUpperFunc(event)" value="{{$citizen->reference}}" placeholder="DIGITE A REFERÊNCIA">
                </div>
            </div>

            <div class="form-group">
                <label for="city_code">Código IBGE:</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                    <input type="text" class="form-control" name="city_code" id="city_code" value="{{$citizen->city_code}}" placeholder="DIGITE O CÓDIGO IBGE">
                </div>
            </div>

        </fieldset>

        <fieldset class="group">

            <div class="form-group">
                <label for="complement">Complemento:</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                    <input type="text" class="form-control" name="complement" id="complement" oninput="toUpperFunc(event)" value="{{$citizen->complement}}" placeholder="DIGITE O COMPLEMENTO">
                </div>
            </div>

        </fieldset>
    
        <div class="text-center">
            <a href="{{route('home')}}" class="btn btn-default" style="width: fit-content;"><span class="glyphicon glyphicon-repeat"></span> Voltar</a>
            <button type="submit" class="btn btn-primary" style="margin-bottom: 0px; width: fit-content;"><span class="glyphicon glyphicon-ok"></span> Salvar</button>
        </div>
    </form>
</div>

<script>
    // Script colocado aqui pela iteração com o citizen
    $(document).ready(function() {
        document.getElementById("gender").value = '{{$citizen->gender}}';
        document.getElementById("breed").value = '{{$citizen->breed}}';
        document.getElementById("nationality").value = '{{$citizen->nationality}}';
        document.getElementById("state").value = '{{$citizen->state}}';
        document.getElementById("adress_type").value = '{{$citizen->adress_type}}';
    });
   
</script>

@endsection