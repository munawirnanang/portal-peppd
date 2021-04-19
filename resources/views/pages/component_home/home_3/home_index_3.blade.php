{{-- author  : Muhamad Munawir Amin
Email        : muhamadmunawiramin@gmail.com
Last Update  : 3 Februari 2021 --}}

@extends('pages.layouts.app')

@section('title', 'Home')

@section('content')
<div class="section no-pad-bot" id="index-banner" style="margin-top: 1%; padding: 2%; padding-right: 0%;">
    
    <div class="container" style="width: 80%;">

        {{-- <img class="image-background" src="{{ asset('images/map-indonesia-2-min.jpg') }}" alt="map-indonesia"> --}}

        <div class="row" style="margin-bottom: 0px;">

            <div class="col s12 m12 l12" style="margin-top: 1%;">
                @include('pages.component_home.home_3.slider_content_3')

                <br>
                @include('pages.component_home.home_3.activity_content_3')
            </div>
        
        </div>

        <div class="row">

            <div class="col s12 m8 l8">
                @include('pages.component_home.home_3.publication_content_3')

                @include('pages.component_home.home_3.guide_content_3')
            </div>
            <div class="col s12 m4 l4">
                @include('pages.component_home.home_3.application_content_3')

                @include('pages.component_home.home_3.contact_us_3')
            </div>

        </div>

    </div>

</div>

@endsection