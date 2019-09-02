@extends('layouts.welcome')

@section('content')
    <div class="center-align web-result">
        @if(\Illuminate\Support\Facades\Session::has('infoGroup'))
            <h3>на <b>{{\Illuminate\Support\Facades\Session::get('infoGroup')['DateShedule']}}</b> для группы <b>{{\Illuminate\Support\Facades\Session::get('infoGroup')['Group']}}</b></h3>
        @endif
    </div>
    <div class="left-align prev">
        <a href="/" class="waves-effect waves-light btn"><i class="material-icons left">fast_rewind</i>Назад</a>
    </div>
    <div>
                <div class="center-align">
                    @if(\Illuminate\Support\Facades\Session::has('shedule'))
                    <table class="striped responsive-table">
                        <thead>
                        <tr>
                            <th scope="col">Пара</th>
                            <th scope="col">Дисциплина</th>
                            <th scope="col">Преподаватель</th>
                            <th scope="col">Территория</th>
                            <th scope="col">Кабинет</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if(array_key_exists(0, \Illuminate\Support\Facades\Session::get('shedule')))
                                @foreach(\Illuminate\Support\Facades\Session::get('shedule') as $shedule)
                                    <tr>
                                        <td>{{$shedule->NumberLesson}}</td>
                                        <td>{{$shedule->Discipline->Name}}</td>
                                        <td>{{$shedule->Teacher->Name}}</td>
                                        <td>{{$shedule->Territory->Name}}</td>
                                        <td>{{$shedule->LectureHall->Name}}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>{{\Illuminate\Support\Facades\Session::get('shedule')->NumberLesson}}</td>
                                    <td>{{\Illuminate\Support\Facades\Session::get('shedule')->Discipline->Name}}</td>
                                    <td>{{\Illuminate\Support\Facades\Session::get('shedule')->Teacher->Name}}</td>
                                    <td>{{\Illuminate\Support\Facades\Session::get('shedule')->Territory->Name}}</td>
                                    <td>{{\Illuminate\Support\Facades\Session::get('shedule')->LectureHall->Name}}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    @else
                        <div class="card-panel grey lighten-3" role="alert">
                            {{\Illuminate\Support\Facades\Session::get('message')}}
                        </div>
                    @endif
                </div>
    </div>
@endsection

