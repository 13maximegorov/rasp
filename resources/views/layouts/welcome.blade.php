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
        <link type="text/css" rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="{{asset('css/bootstrap-datepicker.min.css')}}"  media="screen,projection"/>
        <link rel="stylesheet" href="{{asset('css/style3.css')}}">

        <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/bootstrap-datepicker.ru.min.js')}}"></script>

        <!-- Styles -->
    </head>
    <body>
        <nav class="navbar navbar-expand-lg teal-b shadow-sm">
            <div class="container">
                <div class="text-center w-100">
                    <h3 class="mb-0 d-inline-block"><a href="/" class="text-white">УАТК</a></h3>
                </div>
            </div>
        </nav>
        <div class="main">
            <div class="text-center">
                <h3 class="rasp-title">Расписание</h3>
            </div>
            <div class="container">
                @yield('content')
            </div>
        </div>

        <footer class="page-footer">
            <div class="footer-copyright">
                <div class="container pt-2">
                    <div class="row justify-content-between px-3">
                        {{date("Y")}}
                        <a href="http://www.uatk.ru">УАТК</a>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>

