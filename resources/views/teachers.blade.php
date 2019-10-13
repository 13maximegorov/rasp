@extends('layouts.welcome')

@section('content')
    <div>
        <ul class="nav-pan text-center">
            <li class="btn
"><a href="/students" class="text-dark">Студенты</a></li>
            <li class="btn teal-b"><a href="/teachers" class="text-white">Преподаватели</a></li>
        </ul>
    </div>
        <div>
            <div class="text-left prev">
                <a href="/" class="btn teal-b text-white d-inline-block">Назад</a>
            </div>
    <form action="/teachers" method="post" class="center-align">
        {{csrf_field()}}
            <div class="row">
                <div class="col-12 col-md-8 order-1 order-md-0 order-lg-0 order-xl-0">
                    <div>
                        <ul class="group_list text-left">
                                @foreach($teachers as $teacher)
                                    <li><button class="text-left" name="teacher" type="submit" value="{{$teacher}}" class="gr" href="#">{{$teacher}}</button></li>
                                @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-md-4 text-center mb-5">
                    <div id="box">
                        <div id="datepicker" class="mx-auto"></div>
                        <input name="date" type="hidden" id="my_hidden_input">
                    </div>
                </div>
            </div>
    </form>
        </div>
    <script>
        $(document).ready(function(){
            $('#datepicker').datepicker({
                language: 'ru',
                weekStart: 1,
                format: 'yyyy-mm-dd',
                startDate: '2019-01-01',
                orientation: "top auto"
            }).datepicker("setDate",'now');
            $('#my_hidden_input').val(
                $('#datepicker').datepicker('getFormattedDate')
            );
            $('#datepicker').on('changeDate', function() {
                $('#my_hidden_input').val(
                    $('#datepicker').datepicker('getFormattedDate')
                );
            });

        });
    </script>
@endsection
