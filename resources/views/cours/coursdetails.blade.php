@extends('layouts.app')

@section('content')

    <div class="detail_page">
        <div class="top_cours_details" >
            <div class="courst_etals_text">
                <div class="title_cours_details">
                    <h2> {{ $cours->title }} </h2>
                </div>
                <div class="createdby_cours_details">
                    <b>By : {{ $cours->created_by }} </b>
                </div>
                <div class="description_page_details">
                     <blockquote cite="description" class="text-muted">
                             <?php echo $cours->desc ?>
                     </blockquote>
                </div>
                <div class="link_dowload_cours mt-3">
                    <a href="{{ $cours->url }}"> <button class="btn btn-danger w-100" type=""><i class="fa fa-download" aria-hidden="true"></i> Dwload Cours</button> </a>
                </div>
            </div>
            <div class="cours_detais_img">
                <img src="{{ asset('/storage/'.$cours->img) }}" alt="">
            </div>
        </div>



    </div>

    <div class="all_courses_showing ">
        <h2 class="text-center mb-5">Related Courses</h2>
            <div class="group_for_all">

            @foreach ($courses as $cours)
                <div class="cart_cours">
                    <a href="{{ route('cours.details',$cours->slug) }}">
                        <div class="card_img"> <img src="{{ asset('/storage/'.$cours->img) }}" alt="">  </div>
                        <div class="card_cours_body">
                            <div class="title_cours"><b> {{ Str::limit($cours->title, 50, '') }} </b></div>
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

@endsection