@extends('layouts.app')

@section('content')
<div class="container">
    <div class="desc_section_top">
        <div class="desc_section_top_text">
            <div> <h1>Learn, Everything  Free</h1> </div>
            <div><p>Build skills with Free courses & Learn Without Waste A Dollar , We Are Here To Help You.</p></div>
            <div><a href="{{ route('courses') }}"><button class="btn btn-dark w-50">Start Now</button></a></div>
        </div>
        <div class="desc_section_top_img_two">
            <img src="/img/learntwo.jpg" alt="">
        </div>
        <div class="desc_section_top_img">
            <img src="/img/topimg.png" alt="">
        </div>
    </div>
</div>
@endsection
