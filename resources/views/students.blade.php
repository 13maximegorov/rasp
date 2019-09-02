@extends('layouts.welcome')

@section('content')
    <div>
        <ul class="nav-pan center-align">
            <li class="waves-effect waves-block btn teal lighten-1
"><a href="/students" class="white-text">Студенты</a></li>
            <li class="waves-effect waves-teal btn-flat"><a href="/teachers" class="black-text">Преподаватели</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="">
            <div class="left-align prev">
                <a href="/" class="waves-effect waves-light btn"><i class="material-icons left">fast_rewind</i>Назад</a>
            </div>
            <form action="/students" method="post" class="center-align">
                {{csrf_field()}}
                <div class="input-field">
                    <select name="group" required>
                        <option value="" disabled selected>Выберите группу</option>
                        @foreach($groups as $group)
                            <option value="{{$group}}">{{$group}}</option>
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
