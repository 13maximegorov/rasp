<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Расписание</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">

        <!-- Styles -->
    </head>
    <body>

        <div class="container my-3 px-3 text-center">
            <div class="row">
                <div class="col-12">
                    <a class="mx-auto" href="/"><h2 class="mb-0 web-title">Уфимский автотранспортный колледж </h2></a>
                </div>
            </div>
        </div>
    <div class="container py-1 py-md-3 mb-1">
        <h3 class="text-center rasp-title">Расписание</h3>
    </div>

    <div class="container">
        @yield('content')
    </div>
    <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
