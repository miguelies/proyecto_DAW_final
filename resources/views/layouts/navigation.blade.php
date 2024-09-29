<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="/laravel/Agenda_Virtual/public/inicio">
            AGENDA
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                @if(Auth::user() != NULL)
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
                @endif
                @if (Route::has('login'))
                    @auth
                        
                    @else
                        <a href="{{ route('login') }}" class="nav-link">Iniciar Sesión</a>
                            </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link">Registrarse</a>
                        @endif
                    @endauth
                @endif
                
                </li>
                @if(Auth::user() != NULL)
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle"
                        href="#" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"
                        >
                            <span class="badge badge-pill badge-dark">
                            <i class="fa fa-user-circle-o" aria-hidden="true"></i> 
                                {{Auth::user()->name}}
                            </span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="width: 300x; padding: 0px; border-color: #9DA0A2">
                            <ul>
                                <li class="dropdown-item">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-responsive-nav-link :href="route('logout')" class="dropdown-item"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            {{ __('Cerrar sesión') }}
                                        </x-responsive-nav-link>
                                    </form>
                                </li>
                                <li class="dropdown-item">
                                    <a class="dropdown-item" href="/laravel/Agenda_Virtual/public/perfil">Perfil</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>