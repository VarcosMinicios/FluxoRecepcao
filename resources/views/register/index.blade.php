@extends('layout.layout')

@section('content')
<div class="container" style="margin-top: 60px;">

    <form action="{{route('register_store')}}" method="POST">

        @csrf

        <h3>Informação Pessoal</h3>
        <hr>

        <fieldset class="group">

            <div class="form-group">
                <label for="cpf">CPF: *</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                    <input type="text" class="form-control" name="cpf" id="cpf" placeholder="DIGITE O CPF" required>
                </div>
            </div>

            <div class="form-group">
                <label for="rg">RG:</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                    <input type="text" class="form-control" name="rg" id="rg" placeholder="DIGITE O RG">
                </div>
            </div>

            <div class="form-group">
                <label for="prontuario">Prontuário:</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                    <input type="text" class="form-control" name="prontuario" id="prontuario-init" value="{{$last_prontuario}}" placeholder="DIGITE O N° DE PRONTUÁRIO" readonly>
                </div>
            </div>

        </fieldset>
    
        <fieldset class="group">

            <div class="form-group">
                <label for="name">Nome: *</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" class="form-control" name="name" id="name" oninput="toUpperFunc(event)" placeholder="DIGITE O NOME" required>
                </div>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="mother">Nome da Mãe: *</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" class="form-control" name="mother" id="mother" oninput="toUpperFunc(event)" placeholder="DIGITE A MÃE" required>
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
                    <input type="text" class="form-control" name="cns" id="cns" placeholder="DIGITE O CNS" required>
                </div>
                @error('cns')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="born_day">Data de Nascimento: *</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    <input type="date" class="form-control" name="born_day" id="born_day" placeholder="DIGITE O NASCIMENTO" required>
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
                        <option disabled selected value="">SELECIONE</option>
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
                        <option disabled selected value="">SELECIONE</option>
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
                        <option disabled selected value="">SELECIONE O SEXO</option>
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
                    <input type="email" class="form-control" name="email" id="email" placeholder="DIGITE O EMAIL">
                </div>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone">Telefone Residencial:</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                    <input type="tel" class="form-control" name="phone" id="phone" placeholder="DIGITE O TELEFONE">
                </div>
            </div>

            <div class="form-group">
                <label for="phone_two">Telefone Celular:</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                    <input type="tel" class="form-control" name="cellphone" id="cellphone" placeholder="DIGITE O TELEFONE">
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
                    <input type="text" class="form-control" name="cep" id="cep" placeholder="DIGITE O CEP" required>
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
                        <option disabled selected value="">SELECIONE O ESTADO</option>
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
                    <input type="text" class="form-control" name="city" id="city" oninput="toUpperFunc(event)" placeholder="DIGITE A CIDADE" required>
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
                    <input type="text" class="form-control" name="district" id="district" oninput="toUpperFunc(event)" placeholder="DIGITE O BAIRRO" required>
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
                        <option disabled selected value="">SELECIONE O ESTADO</option>
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
                    <input type="text" class="form-control" name="adress" id="adress" oninput="toUpperFunc(event)" placeholder="DIGITE O ENDEREÇO" required>
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
                    <input type="text" class="form-control" name="number" id="number" placeholder="DIGITE O NÚMERO" required>
                </div>
                @error('number')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="reference">Ponto de Referência:</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                    <input type="text" class="form-control" name="reference" id="reference" oninput="toUpperFunc(event)" placeholder="DIGITE A REFERÊNCIA">
                </div>
            </div>

            <div class="form-group">
                <label for="city_code">Código IBGE:</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                    <input type="text" class="form-control" name="city_code" id="city_code" placeholder="DIGITE O CÓDIGO IBGE">
                </div>
            </div>

        </fieldset>

        <fieldset class="group">

            <div class="form-group">
                <label for="complement">Complemento:</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                    <input type="text" class="form-control" name="complement" id="complement" oninput="toUpperFunc(event)" placeholder="DIGITE O COMPLEMENTO">
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