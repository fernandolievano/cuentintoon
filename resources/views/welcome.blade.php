<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href=" {{ asset('css/app.css') }} ">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <style>
            html, body {
                background-color: RGB(195,255,104);
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .principal-cover{
                width: 71%;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}" data-toggle="tooltip" title="Mi Biblioteca">
                            <i class="fas fa-book-reader"></i>
                        </a>
                    @else
                        <a href="{{ route('login') }}">Inicia Sesión</a>
                        <a href="{{ route('register') }}">Registrate</a>
                    @endauth
                </div>
            @endif

            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-8 col-sm-8 col-xs-8 align-self-center">
                        <a href="{{route('cuentos.index')}}" class="btn btn-block btn-light" data-toggle="tooltip" title="Ingresa a Cuentintoon!">
                            <img class="principal-cover img-fluid" src="{{asset('rsc/simple_logo_ct.png')}}" alt="cover">
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-action active">En Cuentintoon! podrás</li>
                            <li class="list-group-item list-group-item-action">Crear Cuentos</li>
                            <li class="list-group-item list-group-item-action">Leer Cuentos</li>
                            <li class="list-group-item list-group-item-action">Realizar Quizzes</li>
                            <li class="list-group-item list-group-item-action">¡Y sumar puntos para ser el mejor lector del sitio!</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <script src="{{ asset('js/app.js') }}"></script>
        @include('scripts.tooltip')
    </body>
</html>
