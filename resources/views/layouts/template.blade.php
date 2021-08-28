<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>@yield('titlePage')</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Dashboard del portal de AFOSECAT San Martín, nueva actualizacion" name="description" />
        <meta content="" name="author" />
        
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" />
        <link href="{{ url('css/backend/layouts/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" />
        <link href="{{ url('global/bootstrap/bootstrap.min.css') }}" rel="stylesheet" />

        <link href="{{ url('css/backend/layouts/components-rounded.min.css') }}" rel="stylesheet" id="style_components" />
        <link href="{{ url('css/backend/layouts/plugins.min.css') }}" rel="stylesheet" />

        <link href="{{ url('css/backend/layouts/jquery-ui.min.css') }}" rel="stylesheet" /> 
        
        <link href="{{ url('css/backend/layouts/layout.min.css') }}" rel="stylesheet" />
        <link href="{{ url('css/backend/layouts/themes/default.min.css') }}" rel="stylesheet" id="style_color" />
        <link href="{{ url('css/backend/layouts/custom.min.css') }}" rel="stylesheet" />
        <link href="{{ url('css/backend/layouts/todo-2.css') }}" rel="stylesheet" />
  
        @yield('styles')
        <link href="{{ url('css/backend/style.css') }}" rel="stylesheet" />
        
        <link rel="shortcut icon" href="{{ url('storage/images/favicon.png') }}" type="image/png">
    </head>

    <body class="page-header-fixed page-container-bg-solid page-content-white page-sidebar-closed">
        <div class="page-wrapper">
            <!-- CABECERA -->
            @include('layouts.cabecera')
            <!-- CABECERA -->

            <div class="clearfix"> </div>
            
            <div class="page-container">
                
                @include('layouts.menu')
            
                <!-- CONTENIDO -->
                @yield('content')
                <!-- CONTENIDO -->
            </div>
            
            <div class="page-footer">
                <div class="page-footer-inner"> {{ date('Y') }} &copy; AFOSECAT San Martín | Seguridad y Confianza </div>
                <div class="scroll-to-top">
                    <i class="icon-arrow-up"></i>
                </div>
            </div>
        </div>
        
        <script src="{{ url('global/jquery/jquery.min.js') }}"></script>
        <script src="{{ url('js/backend/layouts/jquery-ui.min.js') }}"></script>
        <script src="{{ url('global/bootstrap/bootstrap.min.js') }}"></script>
        <script src="{{ url('js/backend/layouts/js.cookie.min.js') }}"></script>
        <script src="{{ url('global/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ url('global/jquery-validation/jquery.validate.min.js') }}"></script>
        <script src="{{ url('global/jquery/jquery.blockui.min.js') }}"></script>
        <script src="{{ url('global/jquery-validation/messages_es_PE.min.js') }}"></script>
        <script src="{{ url('global/jquery-validation/additional-methods.min.js') }}"></script>
        <script src="{{ url('js/backend/layouts/app.min.js') }}"></script>
        <script src="{{ url('js/backend/layouts/layout.min.js') }}"></script>
        <script src="{{ url('js/backend/layouts/demo.min.js') }}"></script>
        <script src="https://kit.fontawesome.com/c80d35621a.js" crossorigin="anonymous"></script>
        

        @yield('scripts')
        <script src="{{ url('js/backend/todo.js') }}"></script>
    </body>
</html>