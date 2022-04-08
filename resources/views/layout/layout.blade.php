<!DOCTYPE html>
<html lang="pt-br">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

    <link rel="stylesheet" href="{{asset('css/main.css')}}">

    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">

    <title>Veridian</title>

  </head>

  <body>
    <header>
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <img class="navbar-brand" src="{{asset('images/logo.svg')}}" alt="Logo">
            <a class="navbar-brand" href="#">Veridian</a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="{{route('home')}}">HOME</a></li>
              <li><a href="{{route('register_create')}}">CADASTRO</a></li>
              <li><a href="{{route('list')}}">LISTAGEM DE CIDADÃOS</a></li>
              <li><a href="{{route('medical_index')}}">PRÉ-CONSULTA</a></li>
              <li><a href="{{route('medical_show')}}">CONSULTA MÉDICA</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    @yield('content')

    <br style="margin-bottom: 100px;">
    
    <footer class="container-fluid text-center">
      <p><span class="glyphicon glyphicon-map-marker"></span> Rua tal, 123, Cidade - MG</p>
      <p><span class="glyphicon glyphicon-phone"></span> (33) 99999-9999</p>
      <p><span class="glyphicon glyphicon-envelope"></span>  email@dominio.com</p>
    </footer>
  </body>
  
  <script src="{{asset('js/main.js')}}"></script>

</html>