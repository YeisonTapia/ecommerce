<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pollo Brujo Colombia - App</title>
        <link rel="icon" href="http://www.pollobrujo.com.co/wp-content/uploads/2017/02/cropped-logo_pollobrujoco-512-32x32.png">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
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
                color: #5e3308;
                padding: 0 25px;
                font-size: 25px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                font-weight: bold;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body style="background: url('http://www.pollobrujo.com.co/wp-content/uploads/2018/09/fondo-nuevo.jpg');">
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    <img src="http://www.pollobrujo.com.co/wp-content/uploads/2017/02/logo-cabezote.png">
                </div>
                <div class="links">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/home') }}">Inicio</a>
                        @else
                            <a href="{{ route('login') }}">Login</a>

                            @if (Route::has('register') && false)
                                <a href="{{ route('register') }}">Registro</a>
                            @endif
                        @endauth  
                    @endif
                </div>
            </div>
        </div>
    </body>
</html>
