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
            <div class="card-header"><h4><?php echo e(__('Mis Archivos')); ?></h4></div>
            <div class="card-body">
            <div class="row">
            <?php $__currentLoopData = $Archivos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Archivo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo e($Archivo[0]->ruta_archivo); ?></h5>
                    <a href="get/<?php echo e($Archivo[0]->cod_archivos); ?>" class="btn btn-primary bg-secondary">Descargar &#x2B07;</a>
                  </div>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            </div>
          </div>    
        </div>
        <div class="col-md-5">
          <div class="card">
            <div class="card-header"><h4><?php echo e(__('Subir Archivos')); ?></h4></div>
            <div class="card-body">
                <form action="archivos/create" method="post" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

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
  <?php $__env->stopSection(); ?>
  </body>
</html>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\Agenda_Virtual\resources\views/Agenda/archivos.blade.php ENDPATH**/ ?>