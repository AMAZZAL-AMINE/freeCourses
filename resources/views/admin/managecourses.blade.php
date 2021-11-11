@extends('layouts.admin')

@section('content')

    <div class="container">
        @foreach($courses as $cous)
                <div>
                    <h1> {{ $cours->title }} </h1>
                </div>
        @endforeach
    </div>

@endsection