<!doctype html>
<html lang="{{ app()->getLocale() }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bienvenido a Cuentintoon!</title>

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
            .log{
                background-color:rgba(0,0,0,0.9);
                border-radius:15px;
                color:rgb(244,252,232);
                padding:1.5em;
            }
            .tips{
                border-radius:15px;
                color:rgb(78,150,137);
                padding:1.5em;
                background-image: url( '{{ asset('/rsc/logo_min.png') }}' );
                background-position: bottom;
                background-repeat: no-repeat;
                background-size:contain;
                background-color:rgba(244,252,232);
                opacity:0.9;
            }
            /* h1,h2,h3{
                font-family: 'Cherry Swash', cursive;
            } */
            .badge-autor{
                background-color: rgb(78,150,137);
                color:white;
            }
            .badge-nivel{
                background-color: rgb(126,208,214);
                color:white;
            }
        </style>
        <style>
            @import url('https://fonts.googleapis.com/css?family=Cherry+Swash:700|Gabriela');
        </style>
    </head>

    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links ">
                    @auth
                        <a href="{{ url('/home') }}" data-toggle="tooltip" title="Mi Biblioteca">
                            <i class="fas fa-book-reader"></i>
                        </a>
                    @else
                        <a href="{{ route('login') }}" data-toggle="tooltip" title="Iniciar Sesión">
                            <i class="fas fa-sign-in-alt"></i>
                        </a>
                        <a href="{{ route('register') }}" data-toggle="tooltip" title="Registrarse">
                            <i class="fas fa-user-plus"></i>
                        </a>
                    @endauth
                </div>
            @endif

            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-7 col-sm-7 col-xs-12 tips">
                        <ul class="list-unstyled text-dark">
                            <li>
                                <h2 class="display-6">
                                    <i class="fas fa-pen text-info"></i>  Crea Cuentos
                                </h2>
                            </li>
                            <hr>
                            <li>
                                <h2 class="display-6">
                                    <i class="fas fa-book-open text-info"></i>  Lee Cuentos
                                </h2>
                            </li>
                            <hr>
                            <li>
                                <h2 class="display-6">
                                    <i class="fas fa-question text-info"></i> Realiza Quizzes
                                </h2>
                            </li>
                            <hr>
                            <li>
                                <h2 class="display-6">
                                    <i class="fas fa-trophy text-info"></i> ¡Y suma puntos para ser el mejor lector del sitio!
                                </h2>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 log text-left">
                        <h2 class="display-6">El lugar donde vas a poder dar vida a todas esas historias que pasan por tu cabeza</h2>
                        <hr>
                        <h4 class="display-6">Únete a Cuentintoon!</h4>
                        <ul class="list-unstyled">
                        @if (Route::has('login'))
                            @auth
                            <li>
                                <h1 class="display-6">
                                    <a href=" {{ route('cuentos.index') }} " class="badge badge-pill badge-info btn-block">
                                        Ingresar
                                    </a>
                                </h1> 
                            </li>
                            @else
                            <li>
                                <h1 class="display-6">
                                    <a href=" {{ route('register') }} " class="badge badge-pill badge-info btn-block">Registrarse</a>
                                </h1>
                            </li>
                            <li>
                                <h1 class="display-6">
                                    <a href=" {{ route('login') }} " class="btn badge badge-pill btn-outline-light btn-block">Iniciar Sesión</a>
                                </h1>
                            </li>
                            @endauth
                        @endif   
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <script src="{{ asset('js/app.js') }}"></script>
        @include('scripts.tooltip')
    </body>

</html>
