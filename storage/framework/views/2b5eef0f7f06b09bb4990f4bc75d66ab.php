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
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-center"><h1>¿Que somos?</h1></div>
            <br>
            <div class="d-flex justify-content-center"><img src="<?php echo e(URL::asset('')); ?>imagenes/im_inicio1.jpg"  width="40%"/></div>
            <br>
            <div class="d-flex justify-content-center">
              <p>Somos una aplicación Web, la cual se encarga de ser tu Agenda Virtual, nuestra msion es facilitarte el trabajo, nosotros no encargaremos de guardar 
              las cosa que tengas que hacer, tanto tu solo, como un grupo de gente del que participes, ademas de concetarte con tus compañero y jefes para entregar las tareas, queremos convertirnos en tu espacio virtual en
              un futuro, un sitio donde almacenes tus archivos mas importantes y donde entregues las tareas que debas, o para fijarte tus propias actividades.
            </p></div>
          </div>
        </div>    
      </div>
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-center"><h1>¿Quien somos?</h1></div>
            <br>
            <div class="d-flex justify-content-center">
              <p>Soy Luis Miguel García Martínez, y este es mi proyecto de fin de ciclo formativo de grado superior, este aplicación web ha sido desarrollada
               para la asignación de tareas y gestión de equipos de trabajo, en esta, todos los usuarios se registran y poseen la opción de ser creador-administrador de su propio grupo de trabajo.
              Existen dos tipos de tareas, las propias o las grupales, las propias son administradas por tu mismo, y las grupales por un administrador del grupo.
              Atreves de esta, lo que se espera es la creación de tareas con fecha de finalización y posibilidad de adhesión de pruebas de realización de, por ejemplo, fotografías y/o archivos de texto.
              Los usuarios podrán subir archivos para si mismos, como por ejemplo words, pdfs, imágenes…
              Los grupos estarán administrados en origen por su creador, pero este podrá nombrar otros administradores del grupo de trabajo.
              Para las tareas, se podrán marcar, tiempos de entrega, archivos que se han de entregar
              </p>
            </div>
          </div>
        </div>    
      </div>
    </div>
  </div>
  <?php $__env->stopSection(); ?>
  </body>
</html>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\Agenda_Virtual\resources\views/Agenda/inicio.blade.php ENDPATH**/ ?>