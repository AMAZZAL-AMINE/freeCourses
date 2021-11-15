@extends('layouts.app')

@section('content')


<div class="">
    @if ($courses->isNotempty())
        @if (!empty($search))
    <div class="title__header__al_products">
        <div>
                <span></span>
            </div>
            <div class="____text">
                <h2 class="text-center">  Courses Search Result  </h2>
            </div>
        </div>
        <div class="all_courses_showing ">
            <div class="group_for_all">
                @foreach ($courses as $cours)
                    <div class="cart_cours">
                        <a href="{{ route('cours.details',$cours->slug) }}">
                            <div class="card_img"> <img src="{{ asset('/storage/'.$cours->img) }}" alt="">  </div>
                            <div class="card_cours_body">
                                <div class="title_cours"><b> {{ Str::limit($cours->title, 50, '...') }} </b></div>
                                <div class="desc_cours">{{ Str::limit(htmlspecialchars(trim(strip_tags($cours->desc))), 30, '...') }}</div>
                                <div> <a href="{{ route('cours.details',$cours->slug) }}"><button>Show Details</button></a> </div>
                            </div>  
                        </a>
                    </div>
                @endforeach
                @if($courses->count() == 0)
                    <div class="text-center mt-5 mb-5">
                        <p style="font-size : 20px;">Sorry! There No Courses Right Now</p>
                    </div>
                @endif
            </div>
        </div>
    @else 
                <div class="text-center mt-5">
                    <img style="width: 10%;" src="/img/emty.png" alt="">
                     <h2 class="font-weight-bold text-danger">You Put Empty Value</h2>
                </div>
        @endif
            @else 
               <div class="text-center mt-5">
                    <img style="width: 10%; margin-bottom: 35px;" src="/img/not.png" alt="">
                     <h3 class="font-weight-bold text-danger">No Cours Found with  this value <span class="text-primary"> "{{ $search }}" </span></h3>
                </div>
         @endif
</div>
@endsection