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
        <div class="col-md-8">
          <div class="card">
            <div class="card-header"><h4><?php echo e(__('Mis Grupos')); ?></h4></div>
            <div class="card-body">
            <div class="row">
            <?php $__currentLoopData = $grupos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grupo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo e($grupo[0]->nombre_grupo); ?></h5>
                    <p><?php echo e($grupo[0]->descripcion_grupo); ?></p>
                    <a href="grupos/<?php echo e($grupo[0]->cod_grupo); ?>" class="btn btn-primary bg-secondary">Entrar</a>
                  </div>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
  <?php $__env->stopSection(); ?>
  </body>
</html>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\Agenda_Virtual\resources\views/Agenda/grupos.blade.php ENDPATH**/ ?>