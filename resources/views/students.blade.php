@extends('layouts.welcome')

@section('content')
    <div>
        <ul class="nav-pan text-center">
            <li class="btn teal-b
"><a href="/students" class="text-white">Студенты</a></li>
            <li class="btn"><a href="/teachers" class="text-dark">Преподаватели</a></li>
        </ul>
    </div>
        <div>
            <div class="text-left prev">
                <a href="/" class="btn teal-b text-white d-inline-block">Назад</a>
            </div>
            <form action="/students" method="post">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-12 col-md-8 order-1 order-md-0 order-lg-0 order-xl-0">
                        <div>
                            <ul class="group_list text-left">
                                @foreach($groups as $group)
                                    <li><button name="group" type="submit" value="{{$group}}" class="gr" href="#">{{$group}}</button></li>
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
                orientation: 'bottom left'
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
