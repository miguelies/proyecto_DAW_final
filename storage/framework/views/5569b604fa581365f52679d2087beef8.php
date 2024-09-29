<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="/laravel/Agenda_Virtual/public/inicio">
            AGENDA
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <?php if(Auth::user() != NULL): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/laravel/Agenda_Virtual/public/inicio">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/laravel/Agenda_Virtual/public/grupos">Grupo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/laravel/Agenda_Virtual/public/tareas">Tareas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/laravel/Agenda_Virtual/public/archivos">Archivos</a>
                    </li>
                    <li class="nav-item">
                <?php endif; ?>
                <?php if(Route::has('login')): ?>
                    <?php if(auth()->guard()->check()): ?>
                        
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>" class="nav-link">Iniciar Sesión</a>
                            </li>
                        <?php if(Route::has('register')): ?>
                            <li class="nav-item">
                            <a href="<?php echo e(route('register')); ?>" class="nav-link">Registrarse</a>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>
                
                </li>
                <?php if(Auth::user() != NULL): ?>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle"
                        href="#" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"
                        >
                            <span class="badge badge-pill badge-dark">
                            <i class="fa fa-user-circle-o" aria-hidden="true"></i> 
                                <?php echo e(Auth::user()->name); ?>

                            </span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="width: 300x; padding: 0px; border-color: #9DA0A2">
                            <ul>
                                <li class="dropdown-item">
                                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                                        <?php echo csrf_field(); ?>
                                        <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.responsive-nav-link','data' => ['href' => route('logout'),'class' => 'dropdown-item','onclick' => 'event.preventDefault();
                                                            this.closest(\'form\').submit();']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('responsive-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('logout')),'class' => 'dropdown-item','onclick' => 'event.preventDefault();
                                                            this.closest(\'form\').submit();']); ?>
                                            <?php echo e(__('Cerrar sesión')); ?>

                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                                    </form>
                                </li>
                                <li class="dropdown-item">
                                    <a class="dropdown-item" href="/laravel/Agenda_Virtual/public/perfil">Perfil</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav><?php /**PATH C:\xampp\htdocs\laravel\Agenda_Virtual\resources\views/layouts/navigation.blade.php ENDPATH**/ ?>