@extends('layouts.welcome')

@section('content')
    <div class="row my-4">
        <ul class="nav-pan mx-auto px-1 text-center">
            <li class="mb-2"><a href="/teachers" class="text-dark">Преподаватели</a></li>
            <li class="focus1 mb-2"><a href="/students" class="text-white">Студенты</a></li>
        </ul>
    </div>
    <a href="/" class="btn btn-outline-secondary mb-3">Назад</a>

    <form action="/students" method="post" class="mt-2 text-center
">      {{csrf_field()}}
        <div class="form-group">
            <select class="custom-select" name="group" required>
                <option value="">Выберите группу</option>
                @foreach($groups as $group)
                    <option value="{{$group}}">{{$group}}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">Example invalid custom select feedback</div>
        </div>
        <input type="date" class="form-control" id="date" name="date" placeholder="Дата" required>
        <button class="btn btn-outline-primary mt-3" name="search_group">Найти</button>
    </form>
@endsection
