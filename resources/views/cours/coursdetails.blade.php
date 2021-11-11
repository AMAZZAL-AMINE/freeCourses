@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="top_cours_details">
            <div class="courst_etals_text">
                <h1> {{ $cours->title }} </h1>
                <small> Description </small>
                <p> {{ $cours->desc }} </p>

            </div>
            <div class="cours_detais_img">
                <img src="{{ asset('/storage/',$cours->img) }}" alt="">
            </div>
        </div>
    </div>

@endsection