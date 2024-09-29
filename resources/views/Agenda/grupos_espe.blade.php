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
            <div class="card-header"><h4>{{$arrayGrupo[0]['nombre_grupo']}}</h4></div>
            <div class="card-body">
              <h5>{{$arrayGrupo[0]['descripcion_grupo']}}</h5>
              @if($status[0]['administrador']!==0)
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal1">
                  Crear Actividad
              </button>             
              <!-- Modal -->
              <div class="modal fade" id="Modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Crear Actividad</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                        <!--Crear Tareas-->
                            <form action="../acti_crea" method="post">
                            {{ csrf_field() }}
                            <label for="nombre_actividad">Nombre Actividad</label>
                            <input type="text" id="nombre_actividad" name="nombre_actividad" class="form-control" required>
                            <label for="descripcion_actividad">Descripcion</label>
                            <input type="text" id="descripcion_actividad" name="descripcion_actividad" class="form-control" required>
                            <label for="fecha_cierre">Fecha:</label>
                            <input type="date" id="fecha_cierre" name="fecha_cierre" class="form-control">
                            <label for="hora_cierre">Hora:</label>
                            <input type="time" id="hora_cierre" name="hora_cierre" class="form-control">
                            <input type="hidden" id="cod_grupo" name="cod_grupo" class="form-control" value="{{$id}}" >
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
               @endif 
            </div>
            
          </div>    
        </div>
        <div class="col-md-3">
        <div class="card">
            <div class="card-header"><h4>{{ __('Lista')}}</h4></div>
            <div class="card-body">
            @if($status[0]['administrador']!==0)
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal_list1">
                  Eliminar a un Usuarios del Grupo
                </button>
                <br>
                <br>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal_list2">
                  Añadir un usuario al Grupo
                </button>
                <br>
                <br>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal_list3">
                  Borrar el Grupo
                </button>

                <!-- Modal -->
                <div class="modal fade" id="Modal_list1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Eliminar a un usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                      <div class="form-group">
                        <!--Eliminar a un usuario de un grupo-->
                          <form action="../salir" method="post">
                          {{ csrf_field() }}
                          <label for="codigo_usuario">Codigo Usuario</label>
                          <input type="number" id="codigo_usuario" name="codigo_usuario"  min="1" max="999" class="form-control" required>
                          <input type="hidden" id="codigo_grupos" name="codigo_grupos" class="form-control" value="{{$id}}" >
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
                <!-- Modal -->
                <div class="modal fade" id="Modal_list2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Añadir un Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                      <div class="form-group">
                        <!--Añadir a un usuario de un grupo-->
                          <form action="../add" method="post">
                          {{ csrf_field() }}
                          <label for="codigo_usuario">Codigo Usuario</label>
                          <input type="number" id="codigo_usuario" name="codigo_usuario"  min="1" max="999" class="form-control" required>
                          <input type="hidden" id="codigo_grupos" name="codigo_grupos" class="form-control" value="{{$id}}" >
                          <input type="radio" id="no" name="administrador" value="0" required>
                          <label for="val">No Admin</label><br>  
                          <input type="radio" id="si" name="administrador" value="1" required>
                          <label for="val2">Admin</label><br><br>
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
                <!-- Modal -->
                <div class="modal fade" id="Modal_list3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Borrar Grupo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                      <div class="form-group">
                        <!--Eliminar un grupo-->
                          <form action="../borrar" method="post">
                          {{ csrf_field() }}
                          <label for="cod_grupo">Borrar Grupo</label>
                          <input type="hidden" id="cod_grupo" name="cod_grupo" class="form-control" value="{{$id}}" >
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
                @else
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal_list4">
                  Salir del Grupo
                </button>
                <br>
                <br>
                <!-- Modal -->
                <div class="modal fade" id="Modal_list4" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title Area 3</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                      <div class="form-group">
                        <!--Salir del grupo-->
                        <form action="../salir" method="post">
                          {{ csrf_field() }}
                          <label for="codigo_usuario">Salir del Grupo</label>
                          <input type="hidden" id="codigo_usuario" name="codigo_usuario" class="form-control" value="{{$status[0]['codigo_usuario']}}">
                          <input type="hidden" id="codigo_grupos" name="codigo_grupos" class="form-control" value="{{$id}}">
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
                @endif
            </div>
            </div>
          </div>    
        </div>
      </div>
      <br>
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header"><h4>{{ __('Actividad')}}</h4></div>
            <div class="card-body">
            <div class="row">
            @foreach( $arrayTareas as $Tarea )
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">{{$Tarea[0]->nombre_actividad}}</h5>
                    <p>{{$Tarea[0]->descripcion_actividad}}</p>
                    <p>
                      <a class="btn btn-primary" href="../grupos/{{$arrayGrupo[0]['cod_grupo']}}/{{$Tarea[0]->cod_actividad}}" role="button" aria-expanded="false">
                        Entrar
                      </a>
                    </p>
                  </div>
                </div>
              </div>
              <br>
            @endforeach
            
            </div>
            </div>
          </div>    
        </div>
    </div>
    
  @stop
  </body>
</html>