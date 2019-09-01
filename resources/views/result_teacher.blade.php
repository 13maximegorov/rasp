@extends('layouts.welcome')

@section('content')
    <div class="text-center">
        @if(\Illuminate\Support\Facades\Session::has('infoTeacher'))
            <h3>на <b>{{\Illuminate\Support\Facades\Session::get('infoTeacher')['DateShedule']}}</b> для преподавателя <b>{{\Illuminate\Support\Facades\Session::get('infoTeacher')['Teacher']}}</b></h3>
        @endif
    </div>
    <div class="mt-5">
        <a href="/" class="btn btn-outline-secondary mb-3">Назад</a>
                <div class="">
                    @if(\Illuminate\Support\Facades\Session::has('sheduleT'))
                            <table class="table table-hover table-responsive ">
                                <thead>
                                <tr>
                                    <th scope="col">Пара</th>
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
                        <div class="alert alert-secondary" role="alert">
                            {{\Illuminate\Support\Facades\Session::get('message')}}
                        </div>
                        @endif
                </div>
    </div>
@endsection

