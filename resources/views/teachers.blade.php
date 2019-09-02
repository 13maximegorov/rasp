@extends('layouts.welcome')

@section('content')
    <div>
        <ul class="nav-pan center-align">
            <li class="waves-effect waves-teal btn-flat"><a href="/students" class="black-text">Студенты</a></li>
            <li class="waves-effect waves-block btn"><a href="/teachers" class="white-text">Преподаватели</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="">
    <div class="left-align prev">
        <a href="/" class="waves-effect waves-light btn teal lighten-2"><i class="material-icons left">fast_rewind</i>Назад</a>
    </div>
    <form action="/teachers" method="post" class="center-align">
        {{csrf_field()}}
        <div class="input-field">
            <select name="teacher" required>
                <option value="" disabled selected>Выберите преподавателя</option>
                @foreach($teachers as $teacher)
                <option value="{{$teacher}}">{{$teacher}}</option>
                @endforeach
            </select>
        </div>
        <div class="input-field"><input name="date" type="text" class="datepicker" placeholder="Дата"></div>
        <div class="input-field">
            <button type="submit" value="any_value" class="waves-effect waves-light btn-large btn-sub" name="action">Найти</button>
        </div>
    </form>
        </div>
    </div>
@endsection
