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
  
    <?php $__env->startSection('content'); ?>Crear
      <br>
      <br>
      <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header"><h4><?php echo e(__('Crear Grupo')); ?></h4></div>
            <div class="card-body">
            <div class="form-group">
              <form action="" method="post">
                <?php echo e(csrf_field()); ?>

                <label for="nombre_grupo">Nombre del Grupo</label>
                <input type="text" id="nombre_grupo" name="nombre_grupo" class="form-control" required>
                <label for="descripcion_grupo">Descripcion</label>
                <textarea class="form-control" name="descripcion_grupo" id="descripcion_grupo" rows="4"></textarea>
                <br>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Enviar</button>
              </form>
            </div>
            </div>
          </div>    
        </div>   
      </div>
    </div>
    </div>
  <?php $__env->stopSection(); ?>
  </body>
</html>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\Agenda_Virtual\resources\views/Agenda/grupos_create.blade.php ENDPATH**/ ?>