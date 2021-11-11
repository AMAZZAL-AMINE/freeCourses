@extends('layout.admin')

@section('content')

    <div class="container">
        <h1>Hello, This All Categories</h1>
        @foreach($categories as $category)
          <p> {{ $category->name }} </p>
        @endforeach
    </div>

@endsection