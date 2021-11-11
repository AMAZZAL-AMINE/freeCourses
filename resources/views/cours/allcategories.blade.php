@extends('layouts.app')

@section('content')

    <div class="container">
            <div class="all_categories_title">
                 <h1 class="text text-center border-bottom">Select Categories</h1>
            </div>
        <div class="all_categories_click_event">

            @foreach ($categories as $category)
                <div class="cart_category">
                    <div>
                        <img src="{{ asset('/storage/'.$category->img) }}" alt="{{ $category->name }}">  
                    </div>
                    <div class="text">
                        <b> {{ $category->name }} </b>
                    </div>
                    <div>
                        <a href="{{ route('category.find',$category->slug) }}"><button class="btn btn-primary w-100"> Go To Courses </button></a>
                    </div>
                </div>
            @endforeach        
            @if($categories->count() == 0)
                <div class="text-center mt-5 mb-5">
                    <p style="font-size : 20px;"> Sorry! There's No Categories To Show ): </p>
                </div>
            @endif

        </div>
    </div>

@endsection