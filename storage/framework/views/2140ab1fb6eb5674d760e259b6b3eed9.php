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
  
    <?php $__env->startSection('content'); ?>

    <br>
    <br>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-7">
          <div class="card">
            <div class="card-header"><h4><?php echo e(__('Mis Actividades Individuales')); ?></h4></div>
            <div class="card-body">
            <div class="row">
            <?php $__currentLoopData = $arrayTareas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Tarea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo e($Tarea[0]->nombre_actividad); ?></h5>
                    <p><?php echo e($Tarea[0]->descripcion_actividad); ?></p>
                    <p>
                      <a class="btn btn-primary" href="../public/tareas/<?php echo e($Tarea[0]->cod_actividad); ?>" role="button" aria-expanded="false">
                        Entrar
                      </a>
                    </p>
                  </div>
                </div>
              </div>
              <br>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
            </div>
            </div>
          </div>    
        </div>
        <div class="col-md-5">
          <div class="card">
            <div class="card-header"><h4><?php echo e(__('Crear Tarea Individual')); ?></h4></div>
            <div class="card-body">
              <form action="tareas/create" method="post">
                <?php echo e(csrf_field()); ?>

                <label for="nombre_actividad">Nombre Actividad</label>
                <input type="text" id="nombre_actividad" name="nombre_actividad" class="form-control" required>
                <label for="descripcion_actividad">Descripcion</label>
                <input type="text" id="descripcion_actividad" name="descripcion_actividad" class="form-control" required>
                <label for="fecha_cierre">Fecha:</label>
                <input type="date" id="fecha_cierre" name="fecha_cierre" class="form-control">
                <label for="hora_cierre">Hora:</label>
                <input type="time" id="hora_cierre" name="hora_cierre" class="form-control">
                <br>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Enviar</button>
              </form>
            </div>
            </div>
          </div>    
        </div>
      </div>
    </div>
  <?php $__env->stopSection(); ?>
  </body>
</html>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\Agenda_Virtual\resources\views/Agenda/tareas.blade.php ENDPATH**/ ?>