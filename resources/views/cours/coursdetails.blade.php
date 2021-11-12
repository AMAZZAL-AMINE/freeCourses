@extends('layouts.app')

@section('content')

    <div class="detail_page">
        <div class="top_cours_details">
            <div class="courst_etals_text">
                <div class="title_cours_details">
                    <h2>Testing Your Skills Brother hh</h2>
                </div>
                <div class="createdby_cours_details">
                    <b>By : Amine Amazzal</b>
                </div>
                <div class="description_page_details">
                     
                </div>
            </div>
            <div class="cours_detais_img">
                <img src="{{ asset('/storage/'.$cours->img) }}" alt="">
            </div>
        </div>
    </div>

@endsection