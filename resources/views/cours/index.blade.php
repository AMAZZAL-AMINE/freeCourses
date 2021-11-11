@extends('layouts.app')

@section('content')
    <div class="">
        <div class="courses_some_quots">
            <div class="text__quots">
                <div><h1>We Help You,</h1></div>
                <div>
                    <p>
                    We Car About You, Its Time To Build Your Skills And Start Your Business, We Build This For Your, Get All Premium
                    Couses For Free,  
                    </p>
                </div>
                <div>
                    <a href=""> <button class="btn">Suport Us With A Donate  </button> </a>
                </div>
            </div>
        </div>

        <div class="all_courses_showing container">
            <div class="group_for_all">

            @foreach ($courses as $cours)
                <div class="cart_cours">
                    <a href="">
                        <div class="card_img"> <img src="{{ asset('/storage/'.$cours->img) }}" alt="">  </div>
                        <div class="card_cours_body">
                            <div class="title_cours"><b> {{ Str::limit($cours->title, 50, '') }} </b></div>
                            <div class="desc_cours">{{ Str::limit(htmlspecialchars(trim(strip_tags($cours->desc))), 30, '...') }}</div>
                            <div> <a href="{{ route('cours.details',$cours->slug) }}"><button>Show Details</button></a> </div>
                        </div>  
                    </a>
                </div>
            @endforeach

            </div>
        </div>
    </div>
@endsection