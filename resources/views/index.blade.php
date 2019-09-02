@extends('layouts.welcome')

@section('content')
        <div class="row center-align">
            <div class="col s12 m6 l4 offset-l2 offset-0">
                <a href="/students">
                    <div class="card hoverable">
                        <img class="card-img-top" src="{{asset('img/students.svg')}}" alt="">
                        <div class="card-body">
                            <h5 class="card-title">Студенты</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col s12 m6 l4">
                <a href="/teachers">
                    <div class="card hoverable">
                        <img class="card-img-top" src="{{asset('img/teacher.svg')}}" alt="">
                        <div class="card-body">
                            <h5 class="card-title">Преподаватели</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
@endsection
