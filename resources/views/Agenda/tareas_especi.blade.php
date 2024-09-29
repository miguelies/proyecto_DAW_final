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
            <div class="card-header">
              <h4>{{$Tarea[0]['nombre_actividad']}}</h4>
              <p>Fecha de cierre: {{$Tarea[0]['fecha_cierre']}} | Hora de cierre: {{$Tarea[0]['hora_cierre']}}</p>
            </div>
            <div class="card-body">
              <p>{{$Tarea[0]['descripcion_actividad']}}</p>
              @if($estado==1 && $Tarea[0]['estado_actividades'])
              <form action="../tareas/entregar" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <label for="ruta_archivo">Subir Archivo</label>
                <input type="hidden" id="cod_acti" name="cod_acti" class="form-control" value="{{$Tarea[0]['cod_actividad']}}" required>
                <input type="file" id="ruta_archivo" name="ruta_archivo" class="form-control" required>
                <br>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Subir Archivo</button>
              </form>
              @else

                <h5>La actividad esta cerrada</h5>

              @endif
            </div>
          </div>    
        </div>
        <div class="col-md-3">
        <div class="card">
            <div class="card-header"><h4>{{ __('Lista')}}</h4></div>
            <div class="card-body">
            
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal_list1">
                  Borrar Tarea
                </button>
                <br>
                <br>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal_list2">
                  Editar Tarea
                </button>
                <br>
                <br>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal_list3">
                  Ver Subidas
                </button>
                <br>
                <br>

                <!-- Modal -->
                <div class="modal fade" id="Modal_list1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Borrar Actividad</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                      <div class="form-group">
                        <!--Eliminar una tarea-->
                          <form action="../tareas/salir" method="post">
                          {{ csrf_field() }}
                          <label for="cod_acti">Borrar Actividad</label>
                          <input type="hidden" id="cod_acti" name="cod_acti" class="form-control" value="{{$Tarea[0]['cod_actividad']}}" required>
                          <button type="submit" class="btn btn-primary btn-lg btn-block">Confirmar</button>
                          </form>
                      </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="Modal_list3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Archivos Subidos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                      <div class="form-group">
                        <!--Ver archivos subidos-->
                        @if($Archivos)
                        @foreach( $Archivos as $Archivo )
                          <div class="col-sm-12">
                            <div class="card">
                              <div class="card-body">
                                <h5 class="card-title">{{$Archivo[0]->ruta_archivo}}</h5>
                                <a href="../get/{{$Archivo[0]->cod_archivos}}" class="btn btn-primary bg-secondary">Descargar &#x2B07;</a>
                              </div>
                            </div>
                          </div>
                        @endforeach
                        @else
                            <h5>No hay archivos subidos</h5>
                        @endif
                      </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="Modal_list2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modificar Actividad</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                      <div class="form-group">
                        <!--Editar una tarea-->
                          <form action="../tareas/edit" method="post">
                          {{ method_field('PUT') }}
                          {{ csrf_field() }}
                          <input type="hidden" id="cod_acti" name="cod_acti" class="form-control" value="{{$Tarea[0]['cod_actividad']}}" required>
                          <label for="nombre_actividad">Nombre Actividad</label>
                          <input type="text" id="nombre_actividad" name="nombre_actividad" class="form-control" value="{{$Tarea[0]['nombre_actividad']}}" required>
                          <label for="descripcion_actividad">Descripcion</label>
                          <input type="text" id="descripcion_actividad" name="descripcion_actividad" class="form-control" value="{{$Tarea[0]['descripcion_actividad']}}" required>
                          <label for="fecha_cierre">Fecha:</label>
                          <input type="date" id="fecha_cierre" name="fecha_cierre" class="form-control" value="{{$Tarea[0]['fecha_cierre']}}">
                          <label for="hora_cierre">Hora:</label>
                          <input type="time" id="hora_cierre" name="hora_cierre" class="form-control" value="{{$Tarea[0]['hora_cierre']}}">
                          <br>
                          <p>Estado de la actividad</p>
                          <input type="radio" id="no" name="estado" value="1" required>
                          <label for="no">Abierta</label><br>  
                          <input type="radio" id="si" name="estado" value="0" required>
                          <label for="si">Cerrada</label><br><br>
                          <button type="submit" class="btn btn-primary btn-lg btn-block">Enviar</button>
                          </form>
                      </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>    
        </div>
      </div>
    </div>

  @stop
  </body>
</html>