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
        <div class="col-md-7">
          <div class="card">
            <div class="card-header"><h4>{{ __('Mis Archivos')}}</h4></div>
            <div class="card-body">
            <div class="row">
            @foreach( $Archivos as $Archivo )
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">{{$Archivo[0]->ruta_archivo}}</h5>
                    <a href="get/{{$Archivo[0]->cod_archivos}}" class="btn btn-primary bg-secondary">Descargar &#x2B07;</a>
                  </div>
                </div>
              </div>
            @endforeach
            </div>
            </div>
          </div>    
        </div>
        <div class="col-md-5">
          <div class="card">
            <div class="card-header"><h4>{{ __('Subir Archivos')}}</h4></div>
            <div class="card-body">
                <form action="archivos/create" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <label for="ruta_archivo">Ruta del Archivo</label>
                <input type="file" id="ruta_archivo" name="ruta_archivo" class="form-control" required>
                <br>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Subir Archivo</button>
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
