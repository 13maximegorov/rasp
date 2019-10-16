@extends('layouts.welcome')

@section('content')
    <div class="text-center web-result">
        @if(\Illuminate\Support\Facades\Session::has('infoTeacher'))
            <h3>на <b>{{\Illuminate\Support\Facades\Session::get('infoTeacher')['DateShedule1']}}</b> для преподавателя <b>{{\Illuminate\Support\Facades\Session::get('infoTeacher')['Teacher']}}</b></h3>
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
        <a href="/teachers" class="btn teal-b text-white d-inline-block">Назад</a>
    </div>
    <div class="text-center d-block d-sm-block d-md-none">
        <p class="text-danger">*таблица листается влево-вправо</p>
    </div>
    <div>
                <div class="text-center">
                    @if(\Illuminate\Support\Facades\Session::has('sheduleT'))
                            <table class="table table-striped table-responsive w-100">
                                <thead>
                                <tr>
                                    <th scope="col">Пара</th>
                                    @if (\Illuminate\Support\Facades\Session::has('timeT'))
                                        <th scope="col">Время</th>
                                    @endif
                                    <th scope="col">Группа</th>
                                    <th scope="col">Дисциплина</th>
                                    <th scope="col">Территория</th>
                                    <th scope="col">Кабинет</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(array_key_exists(0, \Illuminate\Support\Facades\Session::get('sheduleT')))
                                    @foreach(\Illuminate\Support\Facades\Session::get('sheduleT') as $shedule)
                                        <tr>
                                            <td>{{$shedule->NumberLesson}}</td>
                                            @if (\Illuminate\Support\Facades\Session::has('timeT'))
                                                <td>{{\Illuminate\Support\Facades\Session::get('timeT')[$shedule->NumberLesson]->Begin}} - {{\Illuminate\Support\Facades\Session::get('timeT')[$shedule->NumberLesson]->End}}</td>
                                            @endif
                                            <td>{{$shedule->Group}}</td>
                                            <td>{{$shedule->Discipline->Name}}</td>
                                            <td>{{$shedule->Territory->Name}}</td>
                                            <td>{{$shedule->LectureHall->Name}}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td>{{\Illuminate\Support\Facades\Session::get('sheduleT')->NumberLesson}}</td>
                                        <td>{{\Illuminate\Support\Facades\Session::get('sheduleT')->Group}}</td>
                                        <td>{{\Illuminate\Support\Facades\Session::get('sheduleT')->Discipline->Name}}</td>
                                        <td>{{\Illuminate\Support\Facades\Session::get('sheduleT')->Territory->Name}}</td>
                                        <td>{{\Illuminate\Support\Facades\Session::get('sheduleT')->LectureHall->Name}}</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                    @else
                        <div class="alert alert-secondary mt-3" role="alert">
                            {{\Illuminate\Support\Facades\Session::get('messageT')}}
                        </div>
                        @endif
                </div>
    </div>
    <div class="mt-5">
        <form action="/teachers" method="post">
            {{csrf_field()}}
            <div class="">
                <div class="w-100">
                    <div id="box">
                        <div class="mx-auto" id="datepicker"></div>
                        <input name="date" type="hidden" value="{{\Illuminate\Support\Facades\Session::get('infoTeacher')['DateShedule']}}" id="my_hidden_input">
                    </div>
                </div>
            </div>
            <div class="d-none">
                <li><button id="go" name="teacher" type="submit" value="{{\Illuminate\Support\Facades\Session::get('infoTeacher')['Teacher']}}" class="gr" href="#">{{\Illuminate\Support\Facades\Session::get('infoTeacher')['Teacher']}}</button></li>
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

