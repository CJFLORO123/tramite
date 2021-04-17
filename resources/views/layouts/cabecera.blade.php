<div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner ">
        <div class="page-logo">
            <a href="{{ route('inicio') }}">
                <img src="{{ url('storage/images/logo-blanco.png') }}" alt="logo" class="logo-default" />
            </a>
        </div>

        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
            data-target=".navbar-collapse">
            <span></span>
        </a>
        
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                        data-close-others="true">
                        
                        @isset(Auth::user()->avatar)
                        <img src="{{ urldecode(url('storage', Auth::user()->avatar)) }}" alt="Imágen de perfil" class="img-circle">
                        @endisset

                        @empty(Auth::user()->avatar)
                        <img alt="Imagen de perfil" class="img-circle" src="{{ url('storage/images/avatar_perfil.png') }}" />
                        @endempty

                        <span class="username username-hide-on-mobile"> {{ nombreUsuario(Auth::user()->nombres, Auth::user()->apellidos) }} </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                       
                       
                        <li class="divider"> </li>
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                <i class="icon-key"></i> Salir </a>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>