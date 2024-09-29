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
        <div class="col-md-8">
          <div class="card">
            <div class="card-header"><h4>{{ __('Mis Grupos')}}</h4></div>
            <div class="card-body">
            <div class="row">
            @foreach( $grupos as $grupo )
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">{{$grupo[0]->nombre_grupo}}</h5>
                    <p>{{$grupo[0]->descripcion_grupo}}</p>
                    <a href="grupos/{{$grupo[0]->cod_grupo}}" class="btn btn-primary bg-secondary">Entrar</a>
                  </div>
                </div>
              </div>
            @endforeach
            </div>
            </div>
          </div>    
        </div>
        <div class="col-md-4">
          <a class="btn btn-primary" href="grupos/create" role="button">Crear Grupo</a>
        </div>    
      </div>
    </div>
    </div>
  @stop
  </body>
</html>