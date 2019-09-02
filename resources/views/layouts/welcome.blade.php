<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Расписание</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="{{asset('css/materialize.min.css')}}"  media="screen,projection"/>
        <link rel="stylesheet" href="{{asset('css/style1.css')}}">

        <!-- Styles -->
    </head>
    <body>
    <nav>
        <div class="nav-wrapper teal">
            <div class="container">
                <a href="/" class="brand-logo center">УАТК</a>
            </div>
        </div>
    </nav>
        <div class="main">
            <div class="center-align">
                <h3 class="rasp-title">Расписание</h3>
            </div>
            <div class="container">
                @yield('content')
            </div>
        </div>

        <footer class="page-footer grey lighten-5">
            <div class="footer-copyright">
                <div class="container grey-text text-darken-1">
                    {{date("Y")}}
                    <a class="grey-text text-darken-1 right" href="http://www.uatk.ru">УАТК</a>
                </div>
            </div>
        </footer>
        <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('js/main1.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/materialize.min.js')}}"></script>
    </body>
</html>

