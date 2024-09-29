<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  @extends('layouts.app')
  @section('content')
  <br>
  <br>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-9">
        <div class="card">
          <div class="card-header"><h4>{{ __('Perfil')}}</h4></div>
          <div class="card-body">

              <h5>Nombre de Usuario: {{$Usuario[0]->name}}</h5>
              <br>
              <h6>Codigo Usuaro: {{$Usuario[0]->id}}</h6>
              <br>
              <h6>Email: {{$Usuario[0]->email}}<h6>
          </div>
        </div>    
      </div>
      <div class="col-md-3">
        <div class="card">
          <div class="card-header"><h4>{{ __('Modificar Cuenta')}}</h4></div>
          <div class="card-body">
            <form action="perfil/modificar" method="post">
              {{ method_field('PUT') }}
              {{ csrf_field() }}
              <label for="name">Nombre de Usuario</label>
              <input type="text" id="name" name="name" class="form-control" value="{{$Usuario[0]->name}}" required>
              <label for="email">Email</label>
              <input type="text" id="email" name="email" class="form-control" value="{{$Usuario[0]->email}}" required>
              <br>
              <button type="submit" class="btn btn-primary btn-lg btn-block">Enviar</button>
            </form>
          </div>
          </div>
        </div>    
      </div>
    </div>
  </div>
  @stop
  </body>
</html>