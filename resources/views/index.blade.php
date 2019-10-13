@extends('layouts.welcome')

@section('content')
        <div class="row center-align">
            <div class="col-12 col-md-6 col-lg-4 offset-lg-2 offset-0">
                <a href="/students">
                    <div class="card mb-3">
                        <div class="card-body text-center">
                            <h5 class="card-title">Учебные группы</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <a href="/teachers">
                    <div class="card mb-3">
                        <div class="card-body text-center">
                            <h5 class="card-title">Преподаватели</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
@endsection
