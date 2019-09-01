@extends('layouts.welcome')

@section('content')
    <div class="container mt-2 mt-md-5">
        <div class="row">
            <div class="col-md-2 col-0"></div>

            <div class="col-md-4 col-12 mb-30">
                <a href="/students">
                    <div class="card text-center">
                        <img class="card-img-top p-2" src="{{asset('img/students.svg')}}" alt="">
                        <div class="card-body">
                            <h5 class="card-title">Студенты</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-4 col-12 mb-30">
                <a href="/teachers">
                    <div class="card text-center">
                        <img class="card-img-top p-2" src="{{asset('img/teacher.svg')}}" alt="">
                        <div class="card-body">
                            <h5 class="card-title">Преподаватели</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-2 col-0"></div>
        </div>
    </div>
@endsection
