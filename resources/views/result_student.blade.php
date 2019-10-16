@extends('layouts.welcome')

@section('content')
    <div class="text-center web-result">
        @if(\Illuminate\Support\Facades\Session::has('infoGroup'))
            <h3>на <b>{{\Illuminate\Support\Facades\Session::get('infoGroup')['DateShedule1']}}</b> для группы <b>{{\Illuminate\Support\Facades\Session::get('infoGroup')['Group']}}</b></h3>
        @endif
    </div>
    <div>
        <ul class="nav-pan text-center">
            <li class="btn btn-light
"><a href="/students" class="text-dark">Учебные группы</a></li>
            <li class="btn btn-light"><a href="/teachers" class="text-dark">Преподаватели</a></li>
        </ul>
    </div>
    <div class="text-left prev">
        <a href="/students" class="btn teal-b text-white d-inline-block">Назад</a>
    </div>
    <div class="text-center d-block d-sm-block d-md-none">
        <p class="text-danger">*таблица листается влево-вправо</p>
    </div>
    <div>
                <div class="text-center">
                    @if(\Illuminate\Support\Facades\Session::has('sheduleG'))
                    <table class="table table-striped table-responsive w-100">
                        <thead>
                        <tr>
                            <th scope="col">Пара</th>
                            @if (\Illuminate\Support\Facades\Session::has('time'))
                                <th scope="col">Время</th>
                            @endif
                            <th scope="col">Дисциплина</th>
                            <th scope="col">Преподаватель</th>
                            <th scope="col">Территория</th>
                            <th scope="col">Кабинет</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if(array_key_exists(0, \Illuminate\Support\Facades\Session::get('sheduleG')))
                                @foreach(\Illuminate\Support\Facades\Session::get('sheduleG') as $shedule)
                                    <tr>
                                        <td>{{$shedule->NumberLesson}}</td>
                                        @if (\Illuminate\Support\Facades\Session::has('time'))
                                            <td>{{\Illuminate\Support\Facades\Session::get('time')[$shedule->NumberLesson]->Begin}} - {{\Illuminate\Support\Facades\Session::get('time')[$shedule->NumberLesson]->End}}</td>
                                        @endif
                                        <td>{{$shedule->Discipline->Name}}</td>
                                        <td>{{$shedule->Teacher->Name}}</td>
                                        <td>{{$shedule->Territory->Name}}</td>
                                        <td>{{$shedule->LectureHall->Name}}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>{{\Illuminate\Support\Facades\Session::get('sheduleG')->NumberLesson}}</td>
                                    <td>{{\Illuminate\Support\Facades\Session::get('sheduleG')->Discipline->Name}}</td>
                                    <td>{{\Illuminate\Support\Facades\Session::get('sheduleG')->Teacher->Name}}</td>
                                    <td>{{\Illuminate\Support\Facades\Session::get('sheduleG')->Territory->Name}}</td>
                                    <td>{{\Illuminate\Support\Facades\Session::get('sheduleG')->LectureHall->Name}}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    @else
                        <div class="alert alert-secondary mt-3" role="alert">
                            {{\Illuminate\Support\Facades\Session::get('messageG')}}
                        </div>
                    @endif
                </div>
    </div>
    <div class="mt-5">
        <form action="/students" method="post">
            {{csrf_field()}}
            <div class="mb-4">
                <div class="w-100">
                   <div id="box">
                       <div class="mx-auto" id="datepicker"></div>
                       <input name="date" type="hidden" value="{{\Illuminate\Support\Facades\Session::get('infoGroup')['DateShedule']}}" id="my_hidden_input">
                   </div>
                </div>
            </div>
            <div class="d-none">
                <li><button id="go" name="group" type="submit" value="{{\Illuminate\Support\Facades\Session::get('infoGroup')['Group']}}" class="gr" href="#">{{\Illuminate\Support\Facades\Session::get('infoGroup')['Group']}}</button></li>
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
            });
            $('#datepicker').datepicker('setDate', $('#my_hidden_input').val());
            $('#datepicker').on('changeDate', function() {
                $('#my_hidden_input').val(
                    $('#datepicker').datepicker('getFormattedDate')
                );
                $('#go').click()
            });

        });
    </script>
@endsection

