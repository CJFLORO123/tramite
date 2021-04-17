<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>AFOSECAT San Martín | Seguridad y Confianza</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Dashboard del portal de AFOSECAT San Martín, nueva actualizacion" name="description" />
        <meta content="" name="author" />
        
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" />
        <link href="{{ url('css/backend/layouts/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" />
        <link href="{{ url('global/bootstrap/bootstrap.min.css') }}" rel="stylesheet" />
        
        <link href="{{ url('css/backend/layouts/components-rounded.min.css') }}" rel="stylesheet" id="style_components" />
        <link href="{{ url('css/backend/layouts/plugins.min.css') }}" rel="stylesheet" />
        <link href="{{ url('css/backend/layouts/login.min.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ url('css/backend/style.css') }}" rel="stylesheet" type="text/css" />
        
        <link rel="shortcut icon" href="{{ url('storage/images/favicon.png') }}" type="image/png">
    </head>

    <body class="login">
        <div class="logo">
            <a href="{{ route('inicio') }}">
                <img src="{{ url('storage/images/logo-blanco.png') }}" alt="" /> </a>
        </div>

        <div class="content">
            @yield('content')
        </div>
        <div class="copyright"> {{ date('Y') }} &copy; AFOSECAT San Martín | Seguridad y Confianza </div>
        
        <script src="{{ url('global/jquery/jquery.min.js') }}"></script>
        <script src="{{ url('global/bootstrap/bootstrap.min.js') }}"></script>
        <script src="{{ url('js/backend/layouts/js.cookie.min.js') }}"></script>
        <script src="{{ url('global/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
        
        <script src="{{ url('global/jquery-validation/jquery.validate.min.js') }}"></script>
        <script src="{{ url('global/jquery-validation/messages_es_PE.min.js') }}"></script>
        <script src="{{ url('global/jquery-validation/additional-methods.min.js') }}"></script>
        
        <script src="{{ url('js/backend/layouts/app.min.js') }}"></script>

        <script src="https://kit.fontawesome.com/c80d35621a.js" crossorigin="anonymous"></script>
        <script src="{{ url('js/backend/script.js') }}"></script>
    </body>
</html>